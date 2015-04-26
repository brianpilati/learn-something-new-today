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

    }

?>
