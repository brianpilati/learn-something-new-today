<?php

class FamilyModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAllByCategoryAndClassId($categoryId, $classId) {
        return $this->query($this->selectQuery($categoryId, $classId));
    }

    private function selectQuery($categoryId, $classId) {
        return "
            SELECT 
                p.packageId as packageId,
                c.categoryId as categoryId,
                c.category as category,
                cl.class as class,
                f.family as family
            FROM 
                package p,
                category c,
                class cl,
                family f
            WHERE
                p.categoryId = $categoryId
                AND p.categoryId = c.categoryId
                AND p.classId = $classId
                AND p.classId = cl.classId
                AND p.familyId = f.familyId
            ORDER BY
                family
        ;
      ";
    }
}
?>
