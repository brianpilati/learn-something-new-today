<?php

    class Package {
        private $packageTitle, $itemTitle, $itemDescription, $itemImageUrl, $items;

        public function __construct($packageObject) {
            $this->build($packageObject);
        }

        private function build($packageObject) {
            $this->packageTitle = $packageObject->packageTitle;
            $this->buildItems($packageObject->packageId);
        }

        private function buildItems($packageId) {
            $this->items = array();
            $itemsObj = new ItemModel();
            $itemsObj->getItemsByPackageId($packageId);
            if($itemsObj->result) {
                while($itemObj = $itemsObj->result->fetch_object()) {
                    array_push (
                        $this->items,
                        new Item($itemObj)
                    );
                }
            }
        }

        public function getItems() {
            return $this->items;
        }

        public function getPackageTitle() {
            return $this->packageTitle;
        }
    }
?>
