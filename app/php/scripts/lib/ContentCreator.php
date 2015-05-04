<?php

    class ContentCreator extends Inheritance {
        private $package, $ads, $social, $item, $newLink;

        public function __construct($package, $item) {
            parent::__construct();

            $this->package = $package;
            $this->item = $item;
            $this->ads = new Ads();
            $this->social = new Social();
        }

        public function buildHomePageContent() {
            $html = "<html>";
            $html .= $this->getHeader();
            $html .= $this->getBodyOpen();
            $html .= $this->getTopContainer(true);
            $html .= $this->getHomePageContentContainer();
            $html .= $this->ads->getMarqueeAd();
            $html .= $this->getBottomLinks();
            $html .= $this->getDisclaimer();
            $html .= $this->getBodyClose();
            $html .= "</html>";

            return $html;
        }

        public function buildContent() {
            $html = "<html>";
            $html .= $this->getHeader();
            $html .= $this->getBodyOpen();
            $html .= $this->getTopContainer();
            $html .= $this->ads->getMarqueeAd();
            $html .= $this->getContentContainer();
            $html .= $this->getBottomLinks();
            $html .= $this->getDisclaimer();
            $html .= $this->getBodyClose();
            $html .= "</html>";

            return $html;
        }

        private function getBottomLinks() {
return <<<HTML

                <div class="lsnt-bottom-links">
                    <a href="/siteMap/index.html">Site Map</a>
                </div>
HTML;
        }

        private function getPackageTitle($isHomePage) {
            if ($isHomePage) {
                return;
            }
return <<<HTML

                <div class="lsnt-package-title">{$this->package->getTitle()}</div>
HTML;
        }

        private function getTopContainer($isHomePage=false) {
return <<<HTML

            <!-- google_ad_section_start(weight=ignore) -->
            <div class="top-container">
                {$this->getLogo()}
                {$this->social->getFacebook()}
                {$this->social->getTwitter()}
                {$this->social->getPinterest($this->package->getPackageLink(), $this->package->getPromotionImageUrl(), $this->package->getTitle())}
                {$this->getPackageTitle($isHomePage)}
                {$this->ads->getHeaderAd($isHomePage)}
            </div>
            <!-- google_ad_section_end -->
HTML;
        }

        private function getHomePageContentContainer() {
return <<<HTML

            <div class="content-homepage-container">
                <div class="content-lsnt-container">
                    {$this->getHomePageContent()}
                </div>
            </div>
HTML;
        }

        private function getContentContainer() {
return <<<HTML

            <div class="content-container">
                {$this->ads->getContentAdContainer()}
                <div class="content-lsnt-container">
                    {$this->getContent()}
                    {$this->getNavigation()}
                    {$this->getContentBottomContainer()}
                </div>
            </div>
HTML;
        }

        private function getContentBottomContainer() {
return <<<HTML

                    <!-- google_ad_section_start(weight=ignore) -->
                    <div class="content-bottom-container">
                        {$this->ads->getContentBottomAds()}
                        {$this->ads->getContentBottomLSNTContainer()}
                    </div>
                    <!-- google_ad_section_end -->
HTML;
        }

        private function buildPageTitle() {
            return SITE_TITLE . ' - ' . $this->package->getTitle();
        }

        private function getHeader() {
return <<<HTML

    <head>
        <title>{$this->buildPageTitle()}</title>
        <meta name="keywords" content="{$this->item->getKeywords()}">
        <meta name="description" content="{$this->item->getMetaDescription()}">
        {$this->getPinterestValidation()}
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

        private function getPreviousButton() {
            if ($this->item->getDisplayOrder() === '1') {
                return;
            }
return <<<HTML

                        <div class="lsnt-previous-button"><a href="{$this->getButtonLink($this->item->getPreviousItem())}" alt="Previous Button"><img src="/images/navigation/previousButton.png" alt="Previous Button" title="Previous Button" /></a></div>
HTML;
        }

        private function getStepNumber() {
            if ($this->package->getTotalItems() === 1) {
                return;
            }
return <<<HTML

                            <div class="lsnt-catch-phrase-steps">
                                {$this->item->getDisplayOrder()} of {$this->package->getTotalItems()}
                            </div>

HTML;
        }

        private function getButtonLink($link) {
            return "{$this->package->getPackageLink()}/$link";
            
        }

        private function getNextButton() {
            if ($this->item->getDisplayOrder() == $this->package->getTotalItems()) {
                return;
            }
return <<<HTML

                        <div class="lsnt-next-button"><a href="{$this->getButtonLink($this->item->getNextItem())}" alt="Next Button"><img src="/images/navigation/nextButton.png" alt="Next Button" title="Next Button" /></a></div>
HTML;
        }

        private function getNavigation() {
return <<<HTML

                    <!-- google_ad_section_start(weight=ignore) -->
                    <div class="lsnt-navigation">
                        {$this->getPreviousButton()}
                        {$this->getNextButton()}
                        <div class="lsnt-catch-phrase">
                            <div>
                                Always <span class="italics">continue</span> to learn
                            </div>
                            {$this->getStepNumber()}
                        </div>
                    </div>
                    <!-- google_ad_section_start(weight=ignore) -->
HTML;
        }

        private function getBulletPointOne($bulletPoints) {
            if ($bulletPoints->isBulletPointOne()) {
                $class = ($bulletPoints->getCount() < 4 ? 'lsnt-bullet-one' : 'lsnt-bullet-one-small');
return <<<HTML

                        <div class="{$class}">{$bulletPoints->getBulletPointOne()}</div>
HTML;

            }
        }

        private function getBulletPointTwo($bulletPoints) {
            if ($bulletPoints->isBulletPointTwo()) {
                $class = ($bulletPoints->getCount() < 3 ? 'lsnt-bullet-two' : 'lsnt-bullet-two-small');
return <<<HTML

                        <div class="{$class}">{$bulletPoints->getBulletPointTwo()}</div>
HTML;

            }
        }

        private function getBulletPointThree($bulletPoints) {
            if ($bulletPoints->isBulletPointThree()) {
                $class = ($bulletPoints->getCount() < 4 ? 'lsnt-bullet-four-small' : 'lsnt-bullet-three-small');
return <<<HTML

                        <div class="{$class}">{$bulletPoints->getBulletPointThree()}</div>
HTML;

            }
        }

        private function getBulletPointFour($bulletPoints) {
            if ($bulletPoints->isBulletPointFour()) {
return <<<HTML

                        <div class="lsnt-bullet-four-small">{$bulletPoints->getBulletPointFour()}</div>
HTML;

            }
        }

        private function getBulletPoints() {
            $bulletPoints = $this->item->getBulletPoints();
return <<<HTML

                    <div class="lsnt-bullets">
                        {$this->getBulletPointOne($bulletPoints)}
                        {$this->getBulletPointTwo($bulletPoints)}
                        {$this->getBulletPointThree($bulletPoints)}
                        {$this->getBulletPointFour($bulletPoints)}
                    </div>
HTML;
        }

        private function getHomePageContent() {
return <<<HTML

                    <!-- google_ad_section_start -->
                    <div class="lsnt-featured-today">Featured Today</div>
                    <a href="{$this->package->getPackageUrl()}" alt="View {$this->package->getTitle()}">
                        <div class="lsnt-image"><img src="{$this->package->getPromotionImageUrl()}" alt="{$this->package->getTitle()}" title="{$this->package->getTitle()}"></img></div>
                    </a>
                    <div class="lsnt-title">{$this->package->getTitle()}</div>
                    <a href="{$this->package->getPackageUrl()}" alt="View {$this->package->getTitle()}">
                        <div class="lsnt-next-button"><img src="/images/navigation/see-content-button.png" alt="See Content" /></div>
                    </a>
                    <!-- google_ad_section_end -->
HTML;
        }

        private function getContent() {
return <<<HTML

                    <!-- google_ad_section_start -->
                    <div class="lsnt-title">{$this->item->getTitle()}</div>
                    <div class="lsnt-image"><img src="{$this->item->getImageUrl()}" alt="{$this->item->getAltTag()}" title="{$this->item->getAltTag()}" /></div>
                    {$this->item->getHtmlDescription()}
                    {$this->getBulletPoints()}
                    <!-- google_ad_section_end -->
HTML;
        }
    }
?>
