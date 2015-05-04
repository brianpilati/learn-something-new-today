<?php

    class Social extends Inheritance {
        public function __construct() {
            parent::__construct();
        }

        public function getFacebook() {
            $altAndTitle = "Like {$this->getSiteName()} on Facebook";
            return '<div class="lsnt-facebook"><a target="_blank" href="https://www.facebook.com/lsntoday" alt="' . $altAndTitle . '" title="' . $altAndTitle . '"><img src="/images/social/facebook.jpg" /></a></div>'; }

        public function getTwitter() {
            $altAndTitle = "Follow @lsnewtoday on Twitter";
            return '<div class="lsnt-twitter"><a target="_blank" title="' . $altAndTitle . '" href="https://twitter.com/intent/follow?original_referer=http%3A%2F%2Fwww.learn-something-new-today.com&region=follow_link&screen_name=lsnewtoday&tw_p=followbutton&variant=2.0"><img src="/images/social/twitter.jpg" alt="Follow @lsnt on Twitter" /></a></div>';
        }

        private function buildPinterestUrl($page) {
            return SITE_URL . "$page";
        }

        public function getPinterest($link, $image=null, $description=null) {
            $altAndTitle = "Pin {$this->getSiteName()} on Pinterest";
            $description = ($description ? "&description={$description}" : "");
            $media = ($image ? "&media={$this->buildPinterestUrl($image)}" : "");

            return '<div class="lsnt-pinterest"><a target="_blank" href="//www.pinterest.com/pin/create/button/?url=' . $this->buildPinterestUrl($link) . $media. $description . '" data-pin-do="buttonPin" data-pin-config="none"><img src="/images/social/pinterest.jpg" alt="' . $altAndTitle . '" title="' . $altAndTitle . '" /></a></div>';
        }
    }
?>
