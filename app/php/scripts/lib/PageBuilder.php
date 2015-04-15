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
            $this->buildCategorySiteMap();
            $this->buildPackages();
        }

        private function buildPackages() {
            $this->packageObj->getAll();
            if($this->packageObj->result) {
                while($packageObj = $this->packageObj->result->fetch_object()) {
                    $this->packageItemsObj->getPackageItems($packageObj->packageId);
                    if($this->packageItemsObj->result) {
                        while($packageItemObj = $this->packageItemsObj->result->fetch_object()) {
                            $this->contentCreator = new ContentCreator($packageItemObj);
                            $categoryDirectory = $this->buildCategory($packageItemObj->category, $this->baseDirectory);
                            $classDirectory = $this->buildClass($packageItemObj->class, $categoryDirectory);
                            $familyDirectory = $this->buildFamily($packageItemObj->family, $classDirectory);
                            $itemDirectory = $this->buildItem($packageItemObj->item, $familyDirectory);
                        }
                    }
                }
            }
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

        private function createPage($filePath, $content) {
            $filePath = format_directory($filePath, 'index.html');
            $fileHandle = $this->openFile($filePath);
            fwrite($fileHandle, $content);
            $this->closeFile($fileHandle);
            $this->chmod($filePath);
            $this->chgrp($filePath);
        }

        private function buildHomePageHtml($directory) {
            $this->createPage($directory, $this->contentCreator->buildContent());
        }

        private function buildCategoryHtmlPage($directory) {
            $this->createPage($directory, $this->contentCreator->buildContent());
        }

        private function buildItemHtmlPage($directory) {
            $this->createPage($directory, $this->contentCreator->buildContent());
        }

        private function buildClassPage($directory) {
            $this->buildCategoryHtmlPage($directory);
        }

        private function buildFamilyPage($directory) {
            $this->buildCategoryHtmlPage($directory);
        }

        private function buildCategorySiteMap() {
            $newDirectory = $this->makeDirectory(format_directory($this->baseDirectory, 'siteMap'));

            $siteMap = new SiteMap();
            $this->packageObj->getAll();
            if($this->packageObj->result) {
                while($packageObj = $this->packageObj->result->fetch_object()) {
                    $newLink = $this->buildLink('', $packageObj->category);
                    $siteMap->setItem($newLink, $packageObj->category, $packageObj->category);
                    $this->buildClassSiteMap($newLink, $packageObj->category, $packageObj->categoryId);
                }
            }
            $siteMapContent = new SiteMapContentCreator($siteMap->getSiteMap());
            $this->createPage($newDirectory, $siteMapContent->buildContent());

            return $newDirectory;
        }

        private function buildClassSiteMap($parentLink, $category, $categoryId) {
            $newDirectory = $this->makeDirectory(format_directory($this->baseDirectory, $category));

            $siteMap = new SiteMap();
            $classModel = new ClassModel();
            $classModel->getAllByCategoryId($categoryId);
            if($classModel->result) {
                while($classObj = $classModel->result->fetch_object()) {
                    $classDirectory = $this->makeDirectory(format_directory($newDirectory, $classObj->class));
                    $newLink = $this->buildLink($parentLink, $classObj->class);
                    $siteMap->setItem($newLink, $classObj->class, $classObj->class);
                    $this->buildClassPage($classDirectory);
                }
            }
            $siteMapContent = new SiteMapContentCreator($siteMap->getSiteMap());
            $this->createPage($newDirectory, $siteMapContent->buildContent());

            return $newDirectory;
        }

        private function buildHomePage() {
            $newDirectory = $this->makeDirectory($this->baseDirectory);
            $this->packageObj->getFeaturedPackage();
            if($this->packageObj->result) {
                $this->contentCreator = new ContentCreator($this->packageObj->result->fetch_object());
                $this->buildHomePageHtml($newDirectory);
            }
            
            //This needs to be an error case

            return $newDirectory;
        }

        private function buildCategory($directory, $parentDirectory) {
            $newDirectory = $this->makeDirectory(format_directory($parentDirectory, $directory));
            //$this->buildCategoryHtmlPage($newDirectory);
            return $newDirectory;
        }

        private function buildClass($directory, $parentDirectory) {
            $newDirectory = $this->makeDirectory(format_directory($parentDirectory, $directory));
            //$this->buildClassPage($newDirectory);
            return $newDirectory;
        }

        private function buildFamily($directory, $parentDirectory) {
            $newDirectory = $this->makeDirectory(format_directory($parentDirectory, $directory));
            $this->buildFamilyPage($newDirectory);
            return $newDirectory;
        }

        private function buildItem($directory, $parentDirectory) {
            $newDirectory = $this->makeDirectory(format_directory($parentDirectory, $directory));
            $this->buildItemHtmlPage($newDirectory);
            return $newDirectory;
        }
    }
?>
