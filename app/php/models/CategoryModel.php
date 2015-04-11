<?php

class CategoryModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAllCategories() {
        return $this->query($this->selectQuery());
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
}
?>
