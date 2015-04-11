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
            $this->makeDirectory($this->baseDirectory);
            $this->buildPackages();
        }

        private function buildPackages() {
            $this->packageObj->getAll();
            if($this->packageObj->result) {
                while($dbObj = $this->packageObj->result->fetch_object()) {
                    $directory = format_directory($this->baseDirectory, $dbObj->category);
                    $classDirectory = $this->buildClassDirectory($dbObj->class, $this->makeDirectory($directory));
                    $familyDirectory = $this->buildFamilyDirectory($dbObj->family, $this->makeDirectory($classDirectory));
                }
            }
        }

        private function buildClassDirectory($directory, $parentDirectory) {
            return $this->makeDirectory(format_directory($parentDirectory, $directory));
        }

        private function buildFamilyDirectory($directory, $parentDirectory) {
            return $this->makeDirectory(format_directory($parentDirectory, $directory));
        }
    }
?>
