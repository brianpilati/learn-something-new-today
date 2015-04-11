<?php

    class PageBuilder{
        private $categoryObj, $private;

        public function __construct() {
            $this->baseDirectory = SOURCE_DIRECTORY;
            $this->initializeModels();
            $this->build();
        }

        private function initializeModels() {
            $this->categoryObj = new CategoryModel();
            $this->subCategoryObj = new SubCategoryModel();
        }

        private function makeDirectory($directory) {
            if (!file_exists($directory)) {
                mkdir($directory, 0700, TRUE);
            }
        }

        private function build() {
            $this->makeDirectory($this->baseDirectory);
            $this->buildCategories();
        }

        private function buildCategories() {
            $this->categoryObj->getAllCategories();
            if($this->categoryObj->result) {
                while($dbObj = $this->categoryObj->result->fetch_object()) {
                    $categoryDirectory = format_directory($this->baseDirectory, $dbObj->category);
                    $this->makeDirectory($categoryDirectory);
                    $this->buildSubCategories($dbObj->categoryId, $categoryDirectory);
                }
            }
        }

        private function buildSubCategories($categoryId, $categoryDirectory) {
            $this->subCategoryObj->getAllSubCategories($categoryId);
            if($this->subCategoryObj->result) {
                while($dbObj = $this->subCategoryObj->result->fetch_object()) {
                    $this->makeDirectory(format_directory($categoryDirectory, $dbObj->subCategory));
                }
            }
        }
    }
?>
