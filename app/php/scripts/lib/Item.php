<?php 
    class Item {
        private $displayOrder, $previousItem, $nextItem, $packageId;
        public function __construct($itemInput, $packageId=NULL) {
            $this->packageId = $packageId;
            if (is_object($itemInput)) {
                $this->build($itemInput);
            } else {
                $this->buildById($itemInput);
            }
        }

        private function buildById($itemId) {
            $itemObj = new ItemModel();
            $itemObj->getItemById($itemId);
            if($itemObj->result) {
                $this->build($itemObj->result->fetch_object());
            }
        }

        private function build($itemObj) {
            $this->title = $itemObj->itemTitle;
            $this->description = $itemObj->itemDescription;
            $this->imageUrl = $itemObj->itemImageUrl;
            $this->itemId = $itemObj->itemId;
            $this->altTag = $itemObj->altTag;
            if (ISSET($itemObj->displayOrder)) {
                $this->displayOrder = $itemObj->displayOrder;
            }
            $this->bulletPoints = new BulletPoint($itemObj->itemId);
            $this->keywords = new Keyword($this->packageId, $itemObj->itemId);
        }

        public function getTitle() {
            return $this->title;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getImageUrl() {
            return $this->imageUrl;
        }

        public function getBulletPoints() {
            return $this->bulletPoints;
        }

        public function getId() {
            return $this->itemId;
        }

        public function getDisplayOrder() {
            return $this->displayOrder;
        }

        public function getAltTag() {
            return $this->altTag;
        }

        public function setPreviousItem($itemId) {
            $this->previousItem = $itemId . '.html';
        }

        public function getPreviousItem() {
            return $this->previousItem;
        }

        public function setNextItem($itemId) {
            $this->nextItem = $itemId . '.html';
        }

        public function getNextItem() {
            return $this->nextItem;
        }

        public function getKeywords() {
            return $this->keywords->getkeywords();
        }
    }
?>
