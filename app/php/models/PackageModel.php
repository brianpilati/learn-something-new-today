<?php

class PackageModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAll() {
        return $this->query($this->selectQuery());
    }

    public function getAllCategories() {
        return $this->query($this->selectQuery(true));
    }

    public function getPackageItems($packageId) {
        return $this->query($this->selectPackageItemsQuery($packageId));
    }

    public function getPackageSiteMap($categoryId, $classId, $familyId) {
        return $this->query($this->selectPackageSiteMapQuery($categoryId, $classId, $familyId));
    }

    public function getFeaturedPackage() {
        return $this->query($this->selectPackageItemsQuery(1));
    }

    private function selectQuery($isGroup=false) {
        $groupBy = ($isGroup ? " GROUP BY c.categoryId " : "");
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
            $groupBy
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
                i.itemId as itemId,
                pc.displayOrder as displayOrder
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

    private function selectPackageSiteMapQuery($categoryId, $classId, $familyId) {
        return "
            SELECT 
                p.title as packageTitle
            FROM 
                package p
            WHERE
                p.categoryId = $categoryId
                AND p.classId = $classId
                AND p.familyId = $familyId
            ORDER BY
                p.title
        ;
      ";
    }
}
?>
