<?php

class AmazonAdsTest extends PHPUnit_Framework_TestCase 
{

    private $amazonAds;

    public function setUp() 
    {
        unset($GLOBALS['IS_TEST']);
        $this->amazonAds = new AmazonAds();
    }

    public function tearDown() {
        $GLOBALS['IS_TEST'] = true;
    }

    public function testAd728by90()
    {
        $ad = $this->amazonAds->get728by90Ad();
        $this->assertRegExp("/amzn_assoc_ad_type = 'banner'/", $ad);
        $this->assertRegExp("/amzn_assoc_campaigns = 'holsetforget2'/", $ad);
        $this->assertRegExp("/amzn_assoc_tracking_id = 'leasomnewto03-20'/", $ad);
        $this->assertRegExp("/amzn_assoc_banner_type = 'setandforget'/", $ad);
        $this->assertRegExp("/amzn_assoc_width = '728'/", $ad);
        $this->assertRegExp("/amzn_assoc_height = '90'/", $ad);
    }

    public function testAd300by250()
    {
        $ad = $this->amazonAds->get300by250Ad();
        $this->assertRegExp("/amzn_assoc_ad_type = 'banner'/", $ad);
        $this->assertRegExp("/amzn_assoc_campaigns = 'electronicsrot'/", $ad);
        $this->assertRegExp("/amzn_assoc_tracking_id = 'leasomnewto03-20'/", $ad);
        $this->assertRegExp("/amzn_assoc_banner_type = 'rotating'/", $ad);
        $this->assertRegExp("/amzn_assoc_width = '300'/", $ad);
        $this->assertRegExp("/amzn_assoc_height = '250'/", $ad);
    }
}
