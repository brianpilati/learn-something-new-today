<?php

class CategoryModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAll() {
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
