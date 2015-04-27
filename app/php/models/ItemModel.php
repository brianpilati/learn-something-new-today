<?php

class ItemModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getItemById($itemId) {
        return $this->query($this->selectQueryById($itemId));
    }

    public function getItemsByPackageId($packageId) {
        return $this->query($this->selectQueryByPackageId($packageId));
    }

    private function selectQueryById($itemId) {
        return "
            SELECT 
                itemId as itemId,
                item as item,
                title as itemTitle,
                description as itemDescription,
                imageUrl as itemImageUrl,
                title as altTag 
            FROM 
                item
            WHERE
                itemId = $itemId
        ;
      ";
    }

    private function selectQueryByPackageId($packageId) {
        return "
            SELECT 
                i.itemId as itemId,
                i.item as item,
                i.title as itemTitle,
                i.description as itemDescription,
                i.imageUrl as itemImageUrl,
                pc.displayOrder as displayOrder,
                i.title as altTag
            FROM 
                packageConnector pc,
                item i
            WHERE
                pc.packageId = $packageId
                AND pc.itemId = i.itemId
            ORDER BY
                pc.displayOrder
        ;
      ";
    }
}
?>
