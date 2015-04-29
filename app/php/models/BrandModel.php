<?php

class BrandModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAll($brandId) {
        return $this->query($this->selectQuery($brandId));
    }

    public function addBrand($data) {
        return $this->query($this->insertQuery($data));
    }

    private function selectQuery($brandId) {
        return "
            SELECT 
                brandId,
                brand,
                subCategoryId
            FROM 
                brand 
            ORDER BY
                brand
        ;
      ";
    }

    private function insertQuery($data) {
        return "
            INSERT INTO
                `brand`
                (
                    `brand`,
                    `subCategoryId`,
                    `creationDate`
                )
            VALUES 
                (
                    '{$data['brand']}',
                    '{$data['subCategoryId']}',
                    now()
                )
        ;
      ";
    }
}
?>
