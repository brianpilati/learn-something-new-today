<?php

class KeywordModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getKeywordsByPackageAndItemId($packageId, $itemId) {
        return $this->query($this->selectQueryByPackageAndItemId($packageId, $itemId));
    }

    private function selectQueryByPackageAndItemId($packageId, $itemId) {
        return "
            SELECT 
                keyword
            FROM 
                (
                    (
                        SELECT
                            keyword
                        FROM
                            keywordConnector kc,
                            keyword k,
                            item i
                        WHERE
                            i.itemId = $itemId
                            AND kc.typeId = $itemId 
                            AND kc.type = 'item' 
                            AND kc.keywordId = k.keywordId
                    ) 
                UNION
                    (
                        SELECT 
                            k.keyword as keyword
                        FROM 
                            keywordConnector kc,
                            keyword k,
                            item i,
                            brand b
                        WHERE
                            i.itemId = $itemId
                            AND i.brandId = b.brandId
                            AND kc.typeId = b.brandId 
                            AND kc.type = 'brand' 
                            AND kc.keywordId = k.keywordId
                    ) 
                UNION
                    (
                        SELECT 
                            k.keyword as keyword
                        FROM 
                            keywordConnector kc,
                            keyword k,
                            item i,
                            brand b,
                            subCategory sc
                        WHERE
                            i.itemId = $itemId
                            AND i.brandId = b.brandId
                            AND b.subCategoryId = sc.subCategoryId
                            AND kc.typeId = sc.subCategoryId
                            AND kc.type = 'subcategory' 
                            AND kc.keywordId = k.keywordId
                    ) 
                UNION
                    (
                        SELECT 
                            k.keyword as keyword
                        FROM 
                            keywordConnector kc,
                            keyword k,
                            item i,
                            brand b,
                            subCategory sc,
                            category c
                        WHERE
                            i.itemId = $itemId
                            AND i.brandId = b.brandId
                            AND b.subCategoryId = sc.subCategoryId
                            AND sc.categoryId = c.categoryId
                            AND kc.typeId = c.categoryId
                            AND kc.type = 'category' 
                            AND kc.keywordId = k.keywordId
                    ) 
                ) as brandTable
            ORDER BY
                keyword
        ;
      ";
    }
}
?>
