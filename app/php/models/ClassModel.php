<?php

class ClassModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAllByCategoryId($categoryId) {
        return $this->query($this->selectQuery($categoryId));
    }

    private function selectQuery($categoryId) {
        return "
            SELECT 
                p.packageId as packageId,
                c.categoryId as categoryId,
                c.category as category,
                p.class as class
            FROM 
                package p,
                category c
            WHERE
                p.categoryId = $categoryId
                AND p.categoryId = c.categoryId
            ORDER BY
                p.class
        ;
      ";
    }
}
?>
