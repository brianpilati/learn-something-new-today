<?php
    class Inheritance {
        public function __construct() {
        }

        public function getSiteName() {
            return SITE_NAME;
        }

        public function getTwitterHandle() {
            return SITE_TWITTER_HANDLE;
        }

        public function getLogo() {
return <<<HTML

                <div class="lsnt-logo"><a href="/index.html" alt="{$this->getSiteName()} Home Page" title="{$this->getSiteName()}"><img src="/images/logo.jpg" class="lsnt-logo-image" alt="{$this->getSiteName()}" title="{$this->getSiteName()}" /></a></div>

HTML;
        }
    }

?>
