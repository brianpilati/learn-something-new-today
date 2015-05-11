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

    public function getPackageItem($packageId) {
        return $this->query($this->selectQuery(false, $packageId));
    }

    public function getMorePackages($packageId) {
        return $this->query($this->selectMorePackagesQuery($packageId));
    }

    public function getPackageSiteMap($categoryId, $classId, $familyId) {
        return $this->query($this->selectPackageSiteMapQuery($categoryId, $classId, $familyId));
    }

    public function getFeaturedPackage() {
        return $this->query($this->selectQuery(false, 3));
    }

    private function selectQuery($isGroup=false, $packageId=null) {
        $packageIdWhereStmt = (is_int($packageId) ? " p.packageId = $packageId AND " : "");
        $groupBy = ($isGroup ? " GROUP BY c.categoryId " : "");
        return "
            SELECT 
                p.packageId as packageId,
                c.categoryId as categoryId,
                c.category as category,
                cl.class as class,
                f.family as family,
                p.title as packageTitle,
                p.promotionImage as promotionImage
            FROM 
                package p,
                category c,
                class cl,
                family f
            WHERE
                $packageIdWhereStmt
                p.categoryId = c.categoryId
                AND p.classId = cl.classId
                AND p.familyId = f.familyId
            $groupBy
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

    private function selectMorePackagesQuery($packageId) {
        return "
            SELECT 
                title as packageTitle
            FROM 
                package
            WHERE
                packageId != $packageId
            ORDER BY
                packageId desc
            LIMIT 7
        ;
      ";
    }
}
?>
