<?php

    class AmazonAds {
        public function __construct() {
        }

        public function get728by90Ad() {
            if (IS_TEST) {
                return "Fake 728 by 90 - Amazon Marquee Ad";
            } else {
return <<<HTML

    <div class="alignleft">  
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
            if (IS_TEST) {
                return "Fake 300 by 250 - Amazon Bottom Ad";
            } else {
return <<<HTML

    <div class="alignleft">  
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
    }
?>
