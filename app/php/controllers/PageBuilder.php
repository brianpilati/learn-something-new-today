<?php

    class PageBuilder{
        private $categoryObj, $private;

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
                mkdir($directory, 0700, TRUE);
            }

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
                    $categoryDirectory = $this->buildCategory($dbObj->category, $this->baseDirectory);
                    $classDirectory = $this->buildClass($dbObj->class, $categoryDirectory);
                    $familyDirectory = $this->buildFamily($dbObj->family, $classDirectory);
                    $itemDirectory = $this->buildItem($dbObj->item, $familyDirectory);
                }
            }
        }

        private function openFile($directory) {
            $filePath = format_directory($directory, 'index.html');
            $file = fopen($filePath, "w") or die("Unable to open file!");
            return $file;
        }

        private function closeFile($file) {
            fclose($file);
        }

        private function createPage($filePath, $text) {
            $file = $this->openFile($filePath);
            fwrite($file, $text);
            $this->closeFile($file);
        }

        private function buildHomePage($directory) {
            $this->createPage($directory, 'Home Page');
        }

        private function buildCategoryPage($directory) {
            $this->createPage($directory, 'Category Page');
        }

        private function buildClassPage($directory) {
            $this->buildCategoryPage($directory);
        }

        private function buildFamilyPage($directory) {
            $this->buildCategoryPage($directory);
        }

        private function buildItemHtmlPage($directory) {
            $this->createPage($directory, 'Item Page');
        }

        private function buildLanding($directory) {
            $newDirectory = $this->makeDirectory($directory);
            $this->buildHomePage($newDirectory);
            return $newDirectory;
        }

        private function buildCategory($directory, $parentDirectory) {
            $newDirectory = $this->makeDirectory(format_directory($parentDirectory, $directory));
            $this->buildCategoryPage($newDirectory);
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
