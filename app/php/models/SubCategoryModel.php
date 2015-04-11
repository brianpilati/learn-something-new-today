<?php

class SubCategoryModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAllSubCategories($categoryId) {
        return $this->query($this->selectQuery($categoryId));
    }

    private function selectQuery($categoryId) {
        return "
            SELECT 
                subCategoryId,
                categoryId,
                subCategory
            FROM 
                subCategory
            ORDER BY
                subCategory
        ;
      ";
    }
}
?>
