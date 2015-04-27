<?php

    class SiteMapContentCreator extends Inheritance {
        private $siteMapObj, $social;

        public function __construct($siteMap) {
            parent::__construct();

            $this->siteMapObj = $siteMap;
            $this->social = new Social();
        }

        public function buildContent() {
            $html = "<html>";
            $html .= $this->getHeader();
            $html .= $this->getBodyOpen();
            $html .= $this->getTopContainer();
            $html .= $this->getSiteMapContainer();
            $html .= $this->getDisclaimer();
            $html .= $this->getBodyClose();
            $html .= "</html>";

            return $html;
        }

        private function getHeader() {
return <<<HTML

    <head>
        <title>{$this->getSiteName()}</title>
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

        private function getTopContainer() {
return <<<HTML

            <div class="top-container">
                {$this->getLogo()}
                {$this->social->getFacebook()}
                {$this->social->getTwitter()}
                {$this->social->getPinterest('image')}
                <div class="lsnt-package-title">Site Map</div>
            </div>
HTML;
        }

        private function buildIndexedLink($siteMap) {
            if ($siteMap->getLink() === '/') {
                return "/index.html";
            } else {
                return "{$siteMap->getLink()}/index.html";
            }
        }

        private function getCategory($siteMap) {
return <<<HTML

                    <div class="site-map-category">
                        <a href="{$this->buildIndexedLink($siteMap)}" alt="{$siteMap->getAlt()}">
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
