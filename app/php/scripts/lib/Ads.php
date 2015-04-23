<?php

    class Ads {
        private $amazonAds;
        public function __construct() {
            $this->amazonAds = new AmazonAds();
        }

        private function getHeaderAdContent() {
            if(IS_TEST) {
                return "Fake Google Header Ad";
            } else {
                return "Google Header Ad";
            }
        }

        public function getHeaderAd() {
            if (HEADER_AD || IS_TEST) {
                return '<div class="header-ad">' . $this->getHeaderAdContent() . '</div>';
            }
        }

        private function getMarqueeAdContent() {
            return $this->amazonAds->get728by90Ad();
        }

        public function getMarqueeAd() {
            if (MARQUEE_AD || IS_TEST) {
                return '
            <!-- google_ad_section_start(weight=ignore) -->
            <div class="marquee-container">
                <div class="marquee-ad">
                    ' . $this->getMarqueeAdContent() . '
                </div> 
            </div>
            <!-- google_ad_section_end -->
            ';
            }
        }

        private function displayAdContainer() {
            return MAIN_TOP_AD || MAIN_MIDDLE_AD || MAIN_BOTTOM_AD || IS_TEST;
        }

        public function getContentAdContainer() {
            if ($this->displayAdContainer()) {
return <<<HTML

                <!-- google_ad_section_start(weight=ignore) -->
                <div class="content-ad-container">
                    {$this->getMainTopAd()}
                    {$this->getMainMiddleAd()}
                    {$this->getMainBottomAd()}
                </div>
                <!-- google_ad_section_end -->
HTML;
            }
        }

        private function getMainTopAdContent() {
            if (IS_TEST) {
                return "Fake Google Top Ad";
            } else {
                return "Google Top Ad";
            }
        }

        private function getMainTopAd() {
            if (MAIN_TOP_AD || IS_TEST) {
                return '<div class="ad-top">' . $this->getMainTopAdContent() . '</div>';
            }
        }

        private function getMainMiddleAdContent() {
            if (IS_TEST) {
                return "Fake Google Middle Ad";
            } else {
                return "Google Middle Ad";
            }
        }

        private function getMainMiddleAd() {
            if (MAIN_MIDDLE_AD || IS_TEST) {
                return '<div class="ad-middle">' . $this->getMainMiddleAdContent() . '</div>';
            }
        }

        private function getMainBottomAdContent() {
            return $this->amazonAds->get300by250Ad();
        }

        private function getMainBottomAd() {
            if (MAIN_BOTTOM_AD || IS_TEST) {
                return '<div class="ad-bottom">' . $this->getMainBottomAdContent() . '</div>';
            }
        }

        public function getContentBottomAds() {
return <<<HTML

                        <div class="content-bottom-ad-container">
                            {$this->getBottomLeftAd()}
                            {$this->getBottomCenterAd()}
                            {$this->getBottomRightAd()}
                        </div>
HTML;
        }

        private function getBottomLeftAdContent() {
            if (IS_TEST) {
                return "Fake Google Left Text Ad";
            } else {
                return "Google Left Text Ad";
            }
        }

        private function getBottomLeftAd() {
            if (BOTTOM_LEFT_AD || IS_TEST) {
                return '<div class="ad-left">' . $this->getBottomLeftAdContent() . '</div>';
            }
        }

        private function getBottomCenterAdContent() {
            if (IS_TEST) {
                return "Fake Google Center Text Ad";
            } else {
                return "Google Center Text Ad";
            }
        }

        private function getBottomCenterAd() {
            if (BOTTOM_CENTER_AD || IS_TEST) {
                return '<div class="ad-center">' . $this->getBottomCenterAdContent() . '</div>';
            }
        }

        private function getBottomRightAdContent() {
            if (IS_TEST) {
                return "Fake Google Right Text Ad";
            } else {
                return "Google Right Text Ad";
            }
        }

        private function getBottomRightAd() {
            if (BOTTOM_RIGHT_AD || IS_TEST) {
                return '<div class="ad-right">' . $this->getBottomRightAdContent() . '</div>';
            }
        }

        private function getLSNTPromotionAdContent($counter) {
            if (IS_TEST) {
                return "Fake LSNT Promotion Ad - $counter";
            } else {
                return "LSNT Promotion Ad - $counter";
            }
        }

        private function getLSNTPromotionAd($index) {
            return '<div class="lsnt-package-item">' . $this->getLSNTPromotionAdContent($index) . '</div>';
        }

        private function getLSNTPromotionItems() {
            $promotions = "";
            for ($index=0; $index<4; $index++) {
                $promotions .= $this->getLSNTPromotionAd($index);
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

        private function displayLSNTAdContainer() {
            return LSNT_PROMOTION_ADS || IS_TEST;
        }


        public function getContentBottomLSNTContainer() {
            if ($this->displayLSNTAdContainer()) {
return <<<HTML

                        <div class="content-bottom-lsnt-container">
                            <div class="lsnt-more-packages">Learn more about these exciting categories</div>
                            {$this->getLSNTPackageList()}
                            {$this->getLSNTPackageList()}
                        </div>
HTML;
            }
        }
    }
?>
