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
                cl.classId as classId,
                cl.class as class
            FROM 
                package p,
                category c,
                class cl
            WHERE
                p.categoryId = $categoryId
                AND p.categoryId = c.categoryId
                AND p.classId = cl.classId
            GROUP BY
                c.categoryId
            ORDER BY
                cl.class
        ;
      ";
    }
}
?>
