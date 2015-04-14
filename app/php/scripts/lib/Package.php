<?php

    class Package {
        private $packageTitle, $itemTitle, $itemDescription, $itemImageUrl;

        public function __construct($packageObject) {
            $this->build($packageObject);
        }

        private function build($packageObject) {
            $this->packageTitle = $packageObject->packageTitle;
            $this->itemTitle = $packageObject->itemTitle;
            $this->itemDescription = $packageObject->itemDescription;
            $this->itemImageUrl = $packageObject->itemImageUrl;
            $this->bulletPoints = new BulletPoint($packageObject->itemId);
        }

        public function getPackageTitle() {
            return $this->packageTitle;
        }

        public function getItemTitle() {
            return $this->itemTitle;
        }

        public function getItemDescription() {
            return $this->itemDescription;
        }

        public function getItemImageUrl() {
            return $this->itemImageUrl;
        }
    }
?>
