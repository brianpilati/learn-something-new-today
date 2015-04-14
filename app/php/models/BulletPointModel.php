<?php

class BulletPointModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAll($itemId) {
        return $this->query($this->selectQuery($itemId));
    }

    private function selectQuery($itemId) {
        return "
            SELECT 
                bulletPoint
            FROM 
                bulletPoint
            WHERE
                itemId = $itemId
            ORDER BY
                orderId
        ;
      ";
    }
}
?>
