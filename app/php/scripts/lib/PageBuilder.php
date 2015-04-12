<?php

    class PageBuilder{
        private $packageObj, $contentCreator;

        public function __construct() {
            $this->baseDirectory = SOURCE_DIRECTORY;
            $this->initializeModels();
            $this->build();
        }


        private function initializeModels() {
            $this->packageObj = new PackageModel();
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
            $this->buildLanding($this->baseDirectory);
            $this->buildPackages();
        }

        private function buildPackages() {
            $this->packageObj->getAll();
            if($this->packageObj->result) {
                while($dbObj = $this->packageObj->result->fetch_object()) {
                    $this->contentCreator = new ContentCreator($dbObj);
                    $categoryDirectory = $this->buildCategory($dbObj->category, $this->baseDirectory);
                    $classDirectory = $this->buildClass($dbObj->class, $categoryDirectory);
                    $familyDirectory = $this->buildFamily($dbObj->family, $classDirectory);
                    $itemDirectory = $this->buildItem($dbObj->item, $familyDirectory);
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

        private function buildHomeHtmlPage($directory) {
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

        private function buildLanding($directory) {
            $newDirectory = $this->makeDirectory($directory);
            $this->packageObj->getAll();
            if($this->packageObj->result) {
                $this->contentCreator = new ContentCreator($this->packageObj->result->fetch_object());
                $this->buildHomeHtmlPage($newDirectory);
            }
            
            //This needs to be an error case

            return $newDirectory;
        }

        private function buildCategory($directory, $parentDirectory) {
            $newDirectory = $this->makeDirectory(format_directory($parentDirectory, $directory));
            $this->buildCategoryHtmlPage($newDirectory);
            return $newDirectory;
        }

        private function buildClass($directory, $parentDirectory) {
            $newDirectory = $this->makeDirectory(format_directory($parentDirectory, $directory));
            $this->buildClassPage($newDirectory);
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
