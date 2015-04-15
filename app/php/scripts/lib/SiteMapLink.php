<?php
    class SiteMapLink {
        private $link;

        public function __construct($link, $text, $alt) {
            $this->link = array (
                'link' => $link,
                'text' => $text,
                'alt' => $alt
            );
        }

        public function getLink() {
            return $this->link['link'];
        }

        public function getText() {
            return $this->link['text'];
        }

        public function getAlt() {
            return $this->link['alt'];
        }
    }
?>
