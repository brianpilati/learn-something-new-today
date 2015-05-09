<?php

    class EbayAds {
        public function __construct() {
        }

        public function get300by250Ad() {
            if (ISSET($GLOBALS['IS_TEST'])) {
                return "Fake 300 by 250 - EbayAd";
            } else {
return <<<HTML
                Placeholder

HTML;
            }
        }
    }
?>
