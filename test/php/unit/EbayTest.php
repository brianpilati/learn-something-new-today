<?php

class EbayAdsTest extends PHPUnit_Framework_TestCase 
{

    private $ebayAds;

    public function setUp() 
    {
        unset($GLOBALS['IS_TEST']);
        $this->ebayAds = new EbayAds();
    }

    public function tearDown() {
        $GLOBALS['IS_TEST'] = true;
    }

    public function testAd300by250()
    {
        $ad = $this->ebayAds->get300by250Ad();
        $this->assertRegExp("/campId=5337710521/", $ad);
    }
}
