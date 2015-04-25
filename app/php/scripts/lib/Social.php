<?php

    class Social {
        public function __construct() {
        }

        public function getFacebook() {
            return '<div class="lsnt-facebook"><a target="_blank" href="https://www.facebook.com/lsntoday" alt="Link Learn Something New Today on Facebook"><img src="/images/social/facebook.jpg"></a></div>';
        }

        public function getTwitter() {
            return '<div class="lsnt-twitter"><a id="follow-button" target="_blank" title="Follow @lsnewtoday on Twitter" href="https://twitter.com/intent/follow?original_referer=http%3A%2F%2Fwww.learn-something-new-today.com&region=follow_link&screen_name=lsnewtoday&tw_p=followbutton&variant=2.0"><img src="/images/social/twitter.jpg" alt="Follow @lsnt on Twitter"></a></div>';
        }

        private function buildPinterestUrl($page) {
            return SITE_URL . "$page";
        }

        public function getPinterest($image, $page='') {
            return '<div class="lsnt-pinterest"><a target="_blank" href="//www.pinterest.com/pin/create/button/?url=' . $this->buildPinterestUrl($page) . '&media=' . $image . '&description=Next%20stop%3A%20Pinterest" data-pin-do="buttonPin" data-pin-config="none"><img src="/images/social/pinterest.jpg" alt="Pinterest"></a></div>';
        }
    }
?>
