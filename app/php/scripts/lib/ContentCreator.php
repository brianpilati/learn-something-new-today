<?php

    class ContentCreator {
        private $package;

        public function __construct($packageObj) {
            $this->package = new Package($packageObj);
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
                <div class="lsnt-facebook">fb</div>
                <div class="lsnt-twitter">Tw</div>
                <div class="lsnt-pinterest">Pi</div>
                <div class="lsnt-package-title">{$this->package->getPackageTitle()}</div>
                <div class="header-ad">Google</div>
            </div>
HTML;
        }

        private function getMarqueeContainer() {
return <<<HTML

            <div class="marquee-container">
                <div class="marquee-ad">Amazon</div>
            </div>
HTML;
        }

        private function getContentAdContainer() {
return <<<HTML

                <div class="content-ad-container">
                    <div class="ad-top">Google Top</div>
                    <div class="ad-middle">Google Middle</div>
                    <div class="ad-bottom">Amazon</div>
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

        private function getBulletPoints() {
return <<<HTML

                    <div class="lsnt-bullets">
                        <div class="lsnt-bullet-one">Bullet One</div>
                        <div class="lsnt-bullet-two">Bullet Two</div>
                        <div class="lsnt-bullet-one-small">Bullet One Small</div>
                        <div class="lsnt-bullet-two-small">Bullet Two Small</div>
                        <div class="lsnt-bullet-three-small">Bullet Three</div>
                        <div class="lsnt-bullet-four-small">Bullet Four</div>
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
                            <div class="ad-left">Google Left Text</div>
                            <div class="ad-center">Google Center Text</div>
                            <div class="ad-right">Google Right Text</div>
                        </div>
HTML;
        }

        private function getTopLSNTPackageList() {
return <<<HTML

                            <div class="lsnt-package-container">
                                <div class="lsnt-package-item">1</div>
                                <div class="lsnt-package-item">2</div>
                                <div class="lsnt-package-item">3</div>
                                <div class="lsnt-package-item">4</div>
                            </div>
HTML;
        }

        private function getBottomLSNTPackageList() {
return <<<HTML

                            <div class="lsnt-package-container">
                                <div class="lsnt-package-item">5</div>
                                <div class="lsnt-package-item">6</div>
                                <div class="lsnt-package-item">7</div>
                                <div class="lsnt-package-item">8</div>
                            </div>
HTML;
        }

        private function getContentBottomLSNTContainer() {
return <<<HTML

                        <div class="content-bottom-lsnt-container">
                            <div class="lsnt-more-packages">Learn more about these exciting categories</div>
                            {$this->getTopLSNTPackageList()}
                            {$this->getBottomLSNTPackageList()}
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
