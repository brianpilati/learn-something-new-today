<?php

class ItemModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAll() {
        return $this->query($this->selectQuery());
    }

    public function getFeaturedPackage() {
        return $this->query($this->selectQuery());
    }

    private function selectQuery() {
        return "
            SELECT 
                p.packageId as packageId,
                c.categoryId as categoryId,
                c.category as category,
                p.class as class,
                p.family as family,
                p.title as packageTitle,
                i.item as item,
                i.title as itemTitle,
                i.description as itemDescription,
                i.imageUrl as itemImageUrl,
                i.itemId as itemId
            FROM 
                package p,
                category c,
                packageConnector pc,
                item i
            WHERE
                p.categoryId = c.categoryId
                AND p.packageId = pc.packageId
                AND pc.itemId = i.itemId
            ORDER BY
                c.category, p.class, p.family
        ;
      ";
    }
}
?>
