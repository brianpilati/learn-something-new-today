<?php

    class Package {
        private $packageTitle, $items;

        public function __construct($packageObject) {
            $this->build($packageObject);
        }

        private function build($packageObject) {
            $this->buildPackageLink($packageObject);
            $this->packageTitle = $packageObject->packageTitle;
            $this->buildItems($packageObject->packageId);
            $this->linkItems();
        }

        private function buildItems($packageId) {
            $this->items = array();
            $itemsObj = new ItemModel();
            $itemsObj->getItemsByPackageId($packageId);
            if($itemsObj->result) {
                while($itemObj = $itemsObj->result->fetch_object()) {
                    array_push (
                        $this->items,
                        new Item($itemObj, $packageId)
                    );
                }
            }
        }

        private function buildPackageLink($packageObj) {
            $this->packageLink = "{$packageObj->category}/{$packageObj->class}/{$packageObj->family}/{$packageObj->packageTitle}";
        }

        public function getPackageLink() {
            return "/{$this->packageLink}";
        }

        public function getPackageDir() {
            return $this->packageLink;
        }

        public function linkItems() {
            for($index=0; $index<sizeof($this->items); $index++) {
                $currentItem = $this->items[$index];
                if($index !== 0) {
                    $currentItem->setPreviousItem($this->items[$index-1]->getId());
                }

                if($index !== sizeof($this->items)-1) {
                    $currentItem->setNextItem($this->items[$index+1]->getId());
                }
            }
        }

        public function getTotalItems() {
            return sizeof($this->items);
        }

        public function getItems() {
            return $this->items;
        }

        public function getTitle() {
            return $this->packageTitle;
        }
    }
?>
