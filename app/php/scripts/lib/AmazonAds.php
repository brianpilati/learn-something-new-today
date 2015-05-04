<?php

    class AmazonAds {
        public function __construct() {
        }

        public function get728by90Ad() {
            if (ISSET($GLOBALS['IS_TEST'])) {
                return "Fake 728 by 90 - Amazon Marquee Ad";
            } else {
return <<<HTML

    <div class="align-left">  
        <script type='text/javascript'>
            amzn_assoc_ad_type = 'banner';
            amzn_assoc_tracking_id = 'leasomnewto03-20';
            amzn_assoc_marketplace = 'amazon';
            amzn_assoc_region = 'US';
            amzn_assoc_placement = 'assoc_banner_placement_default';
            amzn_assoc_linkid = 'TYDHVDMC7RBGJYHX';
            amzn_assoc_campaigns = 'holsetforget2';
            amzn_assoc_p = '48';
            amzn_assoc_banner_type = 'setandforget';
            amzn_assoc_width = '728';
            amzn_assoc_height = '90';
        </script>
        <script src='//z-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1'></script>
    </div>
HTML;
            }
        }

        public function get300by250Ad() {
            if (ISSET($GLOBALS['IS_TEST'])) {
                return "Fake 300 by 250 - Amazon Bottom Ad";
            } else {
return <<<HTML

    <div class="align-left">  
        <script type='text/javascript'>
            amzn_assoc_ad_type = 'banner';
            amzn_assoc_tracking_id = 'leasomnewto03-20';
            amzn_assoc_marketplace = 'amazon';
            amzn_assoc_region = 'US';
            amzn_assoc_placement = 'assoc_banner_placement_default';
            amzn_assoc_linkid = '2NXQLHZFEJVNFCEU';
            amzn_assoc_campaigns = 'electronicsrot';
            amzn_assoc_p = '12';
            amzn_assoc_banner_type = 'rotating';
            amzn_assoc_width = '300';
            amzn_assoc_height = '250';
        </script>
        <script src='//z-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1'></script>
    </div>
HTML;
            }
        }

        public function get300by250AdAvengers() {
            if (ISSET($GLOBALS['IS_TEST'])) {
                return "Fake 300 by 250 - Amazon Avengers Ad";
            } else {
return <<<HTML

    <div class="align-center">  
        <iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ac&ref=tf_til&ad_type=product_link&tracking_id=leasomnewto03-20&marketplace=amazon&region=US&placement=B0083SBJXS&asins=B0083SBJXS&linkId=TZSDVTJ6ONY6Q47B&show_border=true&link_opens_in_new_window=true&price_color=24576A&title_color=FFFFFF&bg_color=A8BDC4">
        </iframe>
    </div>
HTML;
            }
        }


    }
?>
