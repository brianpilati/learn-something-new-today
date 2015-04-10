<?php
    class DisplayPage {
        public function __construct($domain, $subject, $group, $item) {
            echo $domain;
            echo $subject;
            echo $group;
            echo $item;
        }
    }

    new DisplayPage($this->domain, $this->subject, $this->group, $this->item);
?>
