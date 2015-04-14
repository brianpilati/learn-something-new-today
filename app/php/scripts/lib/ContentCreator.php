<?php

    class ContentCreator {
        private $package, $ads, $social;

        public function __construct($packageObj) {
            $this->package = new Package($packageObj);
            $this->ads = new Ads();
            $this->social = new Social();
        }

        public function buildContent() {
            $html = "<html>";
            $html .= $this->getHeader();
            $html .= $this->getBodyOpen();
            $html .= $this->getTopContainer();
            $html .= $this->getMarqueeContainer();
            $html .= $this->getContentContainer();
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
                <div class="lsnt-pinterest">{$this->social->getPinterest()}</div>
                <div class="lsnt-package-title">{$this->package->getPackageTitle()}</div>
                <div class="header-ad">{$this->ads->getHeaderAd()}</div>
            </div>
HTML;
        }

        private function getMarqueeContainer() {
return <<<HTML

            <div class="marquee-container">
                <div class="marquee-ad">{$this->ads->getMarqueeAd()}</div>
            </div>
HTML;
        }

        private function getContentAdContainer() {
return <<<HTML

                <div class="content-ad-container">
                    <div class="ad-top">{$this->ads->getMainTopAd()}</div>
                    <div class="ad-middle">{$this->ads->getMainMiddleAd()}</div>
                    <div class="ad-bottom">{$this->ads->getMainBottomAd()}</div>
                </div>
HTML;
        }

        private function getNavigation() {
return <<<HTML

                    <div class="lsnt-navigation">
                        <div class="lsnt-previous-button">&lt; Previous</div>
                        <div class="lsnt-next-button">Next &gt;</div>
                        <div class="lsnt-catch-phrase">
                            <div>
                                Always <span class="italics">continue</span> to learn
                            </div>
                            <div>
                                3 of 6
                            </div>
                        </div>
                    </div>
HTML;
        }

        private function getBulletPointOne() {
            if ($this->package->bulletPoints->isBulletPointOne()) {
                $class = ($this->package->bulletPoints->getCount() < 4 ? 'lsnt-bullet-one' : 'lsnt-bullet-one-small');
return <<<HTML

                        <div class="{$class}">{$this->package->bulletPoints->getBulletPointOne()}</div>
HTML;

            }
        }

        private function getBulletPointTwo() {
            if ($this->package->bulletPoints->isBulletPointTwo()) {
                $class = ($this->package->bulletPoints->getCount() < 3 ? 'lsnt-bullet-two' : 'lsnt-bullet-two-small');
return <<<HTML

                        <div class="{$class}">{$this->package->bulletPoints->getBulletPointTwo()}</div>
HTML;

            }
        }

        private function getBulletPointThree() {
            if ($this->package->bulletPoints->isBulletPointThree()) {
return <<<HTML

                        <div class="lsnt-bullet-three-small">{$this->package->bulletPoints->getBulletPointThree()}</div>
HTML;

            }
        }

        private function getBulletPointFour() {
            if ($this->package->bulletPoints->isBulletPointFour()) {
return <<<HTML

                        <div class="lsnt-bullet-four-small">{$this->package->bulletPoints->getBulletPointFour()}</div>
HTML;

            }
        }

        private function getBulletPoints() {
return <<<HTML

                    <div class="lsnt-bullets">
                        {$this->getBulletPointOne()}
                        {$this->getBulletPointTwo()}
                        {$this->getBulletPointThree()}
                        {$this->getBulletPointFour()}
                    </div>
HTML;
        }

        private function getContent() {
return <<<HTML

                    <div class="lsnt-title">{$this->package->getItemTitle()}</div>
                    <div class="lsnt-image"><img src="{$this->package->getItemImageUrl()}" width="640" height="428" /></div>
                    <div class="lsnt-description">{$this->package->getItemDescription()}</div>
HTML;
        }

        private function getContentBottomAds() {
return <<<HTML

                        <div class="content-bottom-ad-container">
                            <div class="ad-left">{$this->ads->getBottomLeftAd()}</div>
                            <div class="ad-center">{$this->ads->getBottomCenterAd()}</div>
                            <div class="ad-right">{$this->ads->getBottomRightAd()}</div>
                        </div>
HTML;
        }

        private function getLSNTPromotionItem($index) {
return <<<HTML

                                <div class="lsnt-package-item">{$index}</div>
HTML;
        }

        private function getLSNTPromotionItems() {
            $promotions = "";
            for ($index=0; $index<4; $index++) {
                $promotions .= $this->getLSNTPromotionItem($index);
            }
            return $promotions;
        }

        private function getLSNTPackageList() {
return <<<HTML

                            <div class="lsnt-package-container">
                                {$this->getLSNTPromotionItems()}
                            </div>
HTML;
        }

        private function getContentBottomLSNTContainer() {
return <<<HTML

                        <div class="content-bottom-lsnt-container">
                            <div class="lsnt-more-packages">Learn more about these exciting categories</div>
                            {$this->getLSNTPackageList()}
                            {$this->getLSNTPackageList()}
                        </div>
HTML;
        }

        private function getContentBottomContainer() {
return <<<HTML

                    <div class="content-bottom-container">
                        {$this->getContentBottomAds()}
                        {$this->getContentBottomLSNTContainer()}
                    </div>
HTML;
        }

        private function getContentContainer() {
return <<<HTML

            <div class="content-container">
                {$this->getContentAdContainer()}
                <div class="content-lsnt-container">
                    {$this->getContent()}
                    {$this->getBulletPoints()}
                    {$this->getNavigation()}
                    {$this->getContentBottomContainer()}
                </div>
            </div>
HTML;
        }
    }
?>
