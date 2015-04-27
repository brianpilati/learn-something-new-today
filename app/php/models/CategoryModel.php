<?php

class CategoryModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAll() {
        return $this->query($this->selectQuery());
    }

    public function addCategory($data) {
        return $this->query($this->insertQuery($data));
    }

    private function selectQuery() {
        return "
            SELECT 
                categoryId,
                category
            FROM 
                category
            ORDER BY
                category
        ;
      ";
    }

    private function insertQuery($data) {
        return "
            INSERT INTO
                `category`
                (
                    `category`,
                    `creationDate`
                )
            VALUES 
                (
                    '{$data['category']}',
                    now()
                )
        ;
      ";
    }
}
?>
