<?php

class ItemModel extends db {
    function __construct() {
        parent::__construct();
    }

    public function getAll() {
        return $this->query($this->selectQuery());
    }

    private function selectQuery() {
        return "
            SELECT 
                *
            FROM 
                item
        ;
      ";
    }
}
?>
