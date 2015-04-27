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

        private function getGoogleAnalytics() {
            if (GOOGLE_ANALYTICS) {
return <<<HTML

            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                ga('create', 'UA-62290156-1', 'auto');
                ga('send', 'pageview');
            </script>
HTML;
            } else {
                return "<script>Google Analytics</script>";
            }
        }

        public function getBodyClose() {
return <<<HTML

        </div>
    </body>
    {$this->getGoogleAnalytics()}

HTML;
        }

        public function getDisclaimer() {
return <<<HTML

            <!-- google_ad_section_start(weight=ignore) -->
                <div class="lsnt-disclaimer">Copyright &copy; Learn Something New Today 2015. This website is provided "as is" without any representations or warranties, express or implied. {$this->getSiteName()} makes no representations or warranties in relation to this website or the information and materials provided on this website. The material on this website (excluding without limitation the text and computer code) is owned by the original creator. The automated and/or systematic collection of data from this website is prohibited. By using this website, you agree that the exclusions and limitations of liability set out in this website disclaimer are reasonable. If you do not think they are reasonable, you must not use this website.</div>
            <!-- google_ad_section_end -->
HTML;
        }

    }

?>
