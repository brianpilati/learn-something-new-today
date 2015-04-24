<?php

    class ContentCreator {
        private $package, $ads, $social, $item, $newLink;

        public function __construct($package, $item) {
            $this->package = $package;
            $this->item = $item;
            $this->ads = new Ads();
            $this->social = new Social();
        }

        public function buildHomePageContent() {
            $html = "<html>";
            $html .= $this->getHeader();
            $html .= $this->getBodyOpen();
            $html .= $this->getTopContainer();
            $html .= $this->ads->getMarqueeAd();
            $html .= $this->getContentContainer();
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
            $html .= $this->getBodyClose();
            $html .= "</html>";

            return $html;
        }

        private function getTopContainer() {
return <<<HTML

            <!-- google_ad_section_start(weight=ignore) -->
            <div class="top-container">
                <div class="lsnt-logo"><img src="/images/logo.jpg" class="lsnt-logo-image" alt="Learn Something New Today" title="Learn Something New Today" /></div>
                <div class="lsnt-facebook">{$this->social->getFacebook()}</div>
                <div class="lsnt-twitter">{$this->social->getTwitter()}</div>
                <div class="lsnt-pinterest">{$this->social->getPinterest($this->item->getImageUrl(), $this->package->getPackageLink())}</div>
                <div class="lsnt-package-title">{$this->package->getTitle()}</div>
                {$this->ads->getHeaderAd()}
            </div>
            <!-- google_ad_section_end -->
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
        <meta name="description" content="{$this->item->getDescription()}">
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


        private function getPreviousButton() {
            if ($this->item->getDisplayOrder() === '1') {
                return;
            }
return <<<HTML

                        <a href="{$this->item->getPreviousItem()}" alt="Previous Button"><div class="lsnt-previous-button"><img src="/images/navigation/previousButton.png" alt="Previous Button" /></div></a>
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

        private function getNextButton() {
            if ($this->item->getDisplayOrder() == $this->package->getTotalItems()) {
                return;
            }
return <<<HTML

                        <a href="{$this->item->getNextItem()}" alt="Next Button"><div class="lsnt-next-button"><img src="/images/navigation/nextButton.png" alt="Next Button" /></div></a>
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

        private function getFormattedImage() {
            return "/images/items/" . $this->item->getImageUrl();
        }

        private function getContent() {
return <<<HTML

                    <!-- google_ad_section_start -->
                    <div class="lsnt-title">{$this->item->getTitle()}</div>
                    <div class="lsnt-image"><img src="{$this->getFormattedImage()}" alt="{$this->item->getAltTag()}" title="{$this->item->getAltTag()}" width="640" height="428" /></div>
                    <div class="lsnt-description">{$this->item->getDescription()}</div>
                    {$this->getBulletPoints()}
                    <!-- google_ad_section_end -->
HTML;
        }
    }
?>
