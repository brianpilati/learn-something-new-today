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
                k.keyword as keyword
            FROM 
                keywordConnector kc,
                keyword k,
                item i
            WHERE
                i.itemId = $itemId
                AND (kc.typeId = $itemId AND kc.type = 'item' AND kc.keywordId = k.keywordId)
            ORDER BY
                keyword 
        ;
      ";
    }
}
?>
