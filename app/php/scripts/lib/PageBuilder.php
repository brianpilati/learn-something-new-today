<?php

    class PageBuilder{
        private $packageObj, $contentCreator;

        public function __construct() {
            $this->baseDirectory = SOURCE_DIRECTORY;
            $this->initializeModels();
            $this->initializeClasses();
            $this->build();
        }

        private function initializeClasses() {
            $this->contentCreator = new ContentCreator();
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
            $this->buildHomeHtmlPage($newDirectory);
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
