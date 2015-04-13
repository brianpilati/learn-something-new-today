<?php

    class Ads {
        public function __construct() {
        }

        public function getHeaderAd() {
            return "Google Header Ad";
        }

        public function getMarqueeAd() {
            return "Amazon Marquee Ad";
        }

        public function getMainTopAd() {
            return "Google Top Ad";
        }

        public function getMainMiddleAd() {
            return "Google Middle Ad";
        }

        public function getMainBottomAd() {
            return "Amazon Bottom Ad";
        }

        public function getBottomLeftAd() {
            return "Google Left Text Ad";
        }

        public function getBottomCenterAd() {
            return "Google Center Text Ad";
        }

        public function getBottomRightAd() {
            return "Google Right Text Ad";
        }

        public function getLSNTPromotionAd($counter) {
            return "LSNT Promotion Ad - $counter";
        }
    }
?>
