<?php 
    class Item {
        private $item;
        public function __construct($itemInput) {
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
            $this->bulletPoints = new BulletPoint($itemObj->itemId);
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
    }
?>
