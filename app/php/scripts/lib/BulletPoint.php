<?php 
    class BulletPoint {
        private $bulletPoints = array();
        public function __construct($itemId) {
            $this->build($itemId);
        }

        private function build($itemId) {
            $bulletPointObj = new BulletPointModel();
            $bulletPointObj->getAll($itemId);
            if($bulletPointObj->result) {
                while($dbObj = $bulletPointObj->result->fetch_object()) {
                    array_push(
                        $this->bulletPoints,
                        $dbObj->bulletPoint
                    );
                }
            }
        }

        public function getCount() {
            return sizeof($this->bulletPoints);
        }

        private function isBulletPoint($index=0) {
            return ISSET($this->bulletPoints[$index]);
        }

        private function getBulletPoint($index) {
            return $this->isBulletPoint($index) ? $this->bulletPoints[$index] : null;
        }

        public function isBulletPointOne() {
            return $this->isBulletPoint(0);
        }

        public function getBulletPointOne() {
            return $this->getBulletPoint(0);
        }

        public function isBulletPointTwo() {
            return $this->isBulletPoint(1);
        }

        public function getBulletPointTwo() {
            return $this->getBulletPoint(1);
        }

        public function isBulletPointThree() {
            return $this->isBulletPoint(2);
        }

        public function getBulletPointThree() {
            return $this->getBulletPoint(2);
        }

        public function isBulletPointFour() {
            return $this->isBulletPoint(3);
        }

        public function getBulletPointFour() {
            return $this->getBulletPoint(3);
        }
    }
?>
