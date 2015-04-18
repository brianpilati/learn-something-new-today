<?php

    class PageBuilder{
        private $packageObj, $packageItemsObj, $contentCreator;

        public function __construct() {
            $this->baseDirectory = SOURCE_DIRECTORY;
            $this->initializeModels();
            $this->build();
        }

        private function initializeModels() {
            $this->packageObj = new PackageModel();
            $this->packageItemsObj = new PackageModel();
        }

        private function buildLink($parentLink, $link) {
            return "$parentLink/$link";
        }

        private function makeDirectory($directory) {
            if (!file_exists($directory)) {
                mkdir($directory, 0755, TRUE);
            }

            $this->chmod($directory);
            $this->chgrp($directory);

            return $directory;
        }

        private function build() {
            $this->buildHomePage();
            $this->buildSite();
        }

        private function openFile($filePath) {
            $fileHandle = fopen($filePath, "w") or die("Unable to open file!");
            return $fileHandle;
        }

        private function closeFile($fileHandle) {
            fclose($fileHandle);
        }

        private function chmod($file) {
            chmod($file, 0755);
        }

        private function chgrp($file) {
            chgrp($file, "_www");
        }

        private function createPage($filePath, $content, $fileName='index.html') {
            $filePath = format_directory($filePath, $fileName);
            $fileHandle = $this->openFile($filePath);
            fwrite($fileHandle, $content);
            $this->closeFile($fileHandle);
            $this->chmod($filePath);
            $this->chgrp($filePath);
        }

        private function buildHomePageHtml($directory) {
            $this->createPage($directory, $this->contentCreator->buildContent());
        }

        private function buildSite() {
            $newDirectory = $this->makeDirectory(format_directory($this->baseDirectory, 'siteMap'));

            $siteMap = new SiteMap();
            $this->packageObj->getAll();
            if($this->packageObj->result) {
                while($packageObj = $this->packageObj->result->fetch_object()) {
                    $categoryDirectory = $this->makeDirectory(format_directory($this->baseDirectory, $packageObj->category));
                    $newLink = $this->buildLink('', $packageObj->category);
                    $siteMap->setItem($newLink, $packageObj->category, $packageObj->category);
                    $this->buildClassSiteMap($categoryDirectory, $newLink, $packageObj->categoryId);
                }
            }
            $siteMapContent = new SiteMapContentCreator($siteMap->getSiteMap());
            $this->createPage($newDirectory, $siteMapContent->buildContent());
        }

        private function buildClassSiteMap($parentDirectory, $parentLink, $categoryId) {
            $newDirectory = $this->makeDirectory($parentDirectory);

            $siteMap = new SiteMap();
            $classModel = new ClassModel();
            $classModel->getAllByCategoryId($categoryId);
            if($classModel->result) {
                while($classObj = $classModel->result->fetch_object()) {
                    $classDirectory = $this->makeDirectory(format_directory($newDirectory, $classObj->class));
                    $newLink = $this->buildLink($parentLink, $classObj->class);
                    $siteMap->setItem($newLink, $classObj->class, $classObj->class);
                    $this->buildFamilySiteMap($classDirectory, $newLink, $categoryId, $classObj->classId);
                }
            }
            $siteMapContent = new SiteMapContentCreator($siteMap->getSiteMap());
            $this->createPage($newDirectory, $siteMapContent->buildContent());
        }

        private function buildFamilySiteMap($parentDirectory, $parentLink, $categoryId, $classId) {
            $newDirectory = $this->makeDirectory($parentDirectory);

            $siteMap = new SiteMap();
            $familyModel = new FamilyModel();
            $familyModel->getAllByCategoryAndClassId($categoryId, $classId);
            if($familyModel->result) {
                while($familyObj = $familyModel->result->fetch_object()) {
                    $familyDirectory = $this->makeDirectory(format_directory($parentDirectory, $familyObj->family));
                    $newLink = $this->buildLink($parentLink, $familyObj->family);
                    $siteMap->setItem($newLink, $familyObj->family, $familyObj->family);
                    $this->buildItems($familyDirectory, $newLink, $familyObj->packageId);
                }
            }
            $siteMapContent = new SiteMapContentCreator($siteMap->getSiteMap());
            $this->createPage($newDirectory, $siteMapContent->buildContent());
        }

        private function buildItems($parentDirectory, $parentLink, $packageId) {
            $siteMap = new SiteMap();
            $this->packageItemsObj->getPackageItems($packageId);
            if($this->packageItemsObj->result) {
                $package = new Package($this->packageItemsObj->result->fetch_object());
                $newDirectory = $this->makeDirectory(format_directory($parentDirectory, $package->getTitle()));
                $newLink = $this->buildLink($parentLink, $package->getTitle());
                $siteMap->setItem($newLink, $package->getTitle(), $package->getTitle());
                foreach ($package->getItems() as $itemObj) {
                    $this->contentCreator = new ContentCreator($package, $itemObj, $newLink);
                    $this->createPage($newDirectory, $this->contentCreator->buildContent(), $itemObj->getId() . ".html");
                    if ($itemObj->getDisplayOrder() === "1") {
                        $this->createPage($newDirectory, $this->contentCreator->buildContent());
                    }

                }
            }

            $siteMapContent = new SiteMapContentCreator($siteMap->getSiteMap());
            $this->createPage($parentDirectory, $siteMapContent->buildContent());
        }

        private function buildHomePage() {
            $newDirectory = $this->makeDirectory($this->baseDirectory);
            $this->packageObj->getFeaturedPackage();
            if($this->packageObj->result) {
                $package = new Package($this->packageObj->result->fetch_object());

                $this->contentCreator = new ContentCreator($package, $package->getItems()[0]);
                $this->buildHomePageHtml($newDirectory);
            }
            
            //This needs to be an error case

            return $newDirectory;
        }
    }
?>
