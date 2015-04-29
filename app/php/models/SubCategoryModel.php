<?php

class SubCategoryModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAll($subCategoryId) {
        return $this->query($this->selectQuery($subCategoryId));
    }

    public function addSubCategory($data) {
        return $this->query($this->insertQuery($data));
    }

    private function selectQuery($subCategoryId) {
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

    private function insertQuery($data) {
        return "
            INSERT INTO
                `subCategory`
                (
                    `subCategory`,
                    `categoryId`,
                    `creationDate`
                )
            VALUES 
                (
                    '{$data['subCategory']}',
                    '{$data['categoryId']}',
                    now()
                )
        ;
      ";
    }
}
?>
