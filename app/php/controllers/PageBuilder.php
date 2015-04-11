<?php

    class PageBuilder{
        private $categoryObj;

        public function __construct() {
            $this->categoryObj = new CategoryModel();
            $this->categoryObj->getAllCategories();
            if($this->categoryObj->result) {
                while($dbObj = $this->categoryObj->result->fetch_object()) {
                    $this->category = $dbObj->category;
                }
            }
        }
    }
?>
