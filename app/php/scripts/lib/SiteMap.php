<?php
    class SiteMap {
        private $links = array();

        public function __construct() {
        }

        public function setItem($link, $text, $alt) {
            array_push(
                $this->links,
                new SiteMapLink (
                    $link,
                    $text,
                    $alt
                )
            );
        }

        public function getSiteMap() {
            return $this->links;
        }
    }
?>
