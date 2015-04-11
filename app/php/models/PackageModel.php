<?php

class PackageModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAll() {
        return $this->query($this->selectQuery());
    }

    private function selectQuery() {
        return "
            SELECT 
                p.packageId as packageId,
                c.categoryId as categoryId,
                c.category as category,
                p.class as class,
                p.family as family
            FROM 
                package p,
                category c
            WHERE
                p.categoryId = c.categoryId
            ORDER BY
                c.category, p.class, p.family
        ;
      ";
    }
}
?>
