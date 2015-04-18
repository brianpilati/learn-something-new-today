<?php

    class SiteMapContentCreator {
        private $siteMapObj, $social;

        public function __construct($siteMap) {
            $this->siteMapObj = $siteMap;
            $this->social = new Social();
        }

        public function buildContent() {
            $html = "<html>";
            $html .= $this->getHeader();
            $html .= $this->getBodyOpen();
            $html .= $this->getTopContainer();
            $html .= $this->getSiteMapContainer();
            $html .= $this->getBodyClose();
            $html .= "</html>";

            return $html;
        }

        private function getHeader() {
return <<<HTML

    <head>
        <title>Learn Something New Today</title>
        <link rel="stylesheet" type="text/css" href="/lib/lsnt.css" />
    </head>
HTML;
        }

        private function getBodyOpen() {
return <<<HTML

    <body>
        <div class="main">
HTML;
        }

        private function getBodyClose() {
return <<<HTML

        </div>
    </body>

HTML;
        }

        private function getTopContainer() {
return <<<HTML

            <div class="top-container">
                <div class="lsnt-logo">Learn Something New Today</div>
                <div class="lsnt-facebook">{$this->social->getFacebook()}</div>
                <div class="lsnt-twitter">{$this->social->getTwitter()}</div>
                <div class="lsnt-pinterest">{$this->social->getPinterest('image')}</div>
                <div class="lsnt-package-title">Site Map</div>
            </div>
HTML;
        }

        private function getCategory($siteMap) {
return <<<HTML

                    <div class="site-map-category">
                        <a href="{$siteMap->getLink()}" alt="{$siteMap->getAlt()}">
                            {$siteMap->getText()}
                        </a>
                    </div>
HTML;
        }

        private function getCategories() {
            $packagesHtml = "";
            foreach($this->siteMapObj as $siteMap) {
                $packagesHtml .= $this->getCategory($siteMap); 
            }

            return $packagesHtml;
        }

        private function getSiteMapContainer() {
return <<<HTML

            <div class="site-map-container">
                {$this->getCategories()}
            </div>
HTML;
        }
    }
?>
