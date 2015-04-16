<?php

class PackageModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAll() {
        return $this->query($this->selectQuery());
    }

    public function getPackageItems($packageId) {
        return $this->query($this->selectPackageItemsQuery($packageId));
    }

    public function getFeaturedPackage() {
        return $this->query($this->selectPackageItemsQuery(2));
    }

    private function selectQuery() {
        return "
            SELECT 
                p.packageId as packageId,
                c.categoryId as categoryId,
                c.category as category
            FROM 
                package p,
                category c
            WHERE
                p.categoryId = c.categoryId
            ORDER BY
                c.category
        ;
      ";
    }

    private function selectPackageItemsQuery($packageId) {
        return "
            SELECT 
                p.packageId as packageId,
                c.categoryId as categoryId,
                c.category as category,
                cl.class as class,
                f.family as family,
                p.title as packageTitle,
                i.item as item,
                i.title as itemTitle,
                i.description as itemDescription,
                i.imageUrl as itemImageUrl,
                i.itemId as itemId
            FROM 
                package p,
                category c,
                class cl,
                family f,
                packageConnector pc,
                item i
            WHERE
                p.packageId = $packageId
                AND p.categoryId = c.categoryId
                AND p.classId = cl.classId
                AND p.familyId = f.familyId
                AND p.packageId = pc.packageId
                AND pc.itemId = i.itemId
            ORDER BY
                c.category, cl.class, f.family
        ;
      ";
    }
}
?>
