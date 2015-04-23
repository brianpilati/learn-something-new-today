<?php

class AdsTest extends PHPUnit_Framework_TestCase 
{

    private $ads;

    public function setUp() 
    {
        $this->ads = new Ads();
    }

    public function testGetHeaderAd()
    {
        $this->assertRegExp('/Fake Google Header Ad/', $this->ads->getHeaderAd());
    }

    public function testGetMarqueeAd()
    {
        $this->assertRegExp('/Fake 728 by 90 - Amazon Marquee Ad/', $this->ads->getMarqueeAd());
    }

    public function testGetMainTopAd()
    {
        $this->assertRegExp('/Fake Google Top Ad/', $this->ads->getContentAdContainer());
    }

    public function testGetMainMiddleAd()
    {
        $this->assertRegExp('/Fake Google Middle Ad/', $this->ads->getContentAdContainer());
    }

    public function testGetMainBottomAd()
    {
        $this->assertRegExp('/Fake 300 by 250 - Amazon Bottom Ad/', $this->ads->getContentAdContainer());
    }

    public function testGetBottomLeftAd()
    {
        $this->assertRegExp('/Fake Google Left Text Ad/', $this->ads->getContentBottomAds());
    }

    public function testGetBottomCenterAd()
    {
        $this->assertRegExp('/Fake Google Center Text Ad/', $this->ads->getContentBottomAds());
    }

    public function testGetBottomRightAd()
    {
        $this->assertRegExp('/Fake Google Right Text Ad/', $this->ads->getContentBottomAds());
    }

    public function testGetContentBottomLSNTContainer()
    {
        $this->assertRegExp('/Fake LSNT Promotion Ad - 0/', $this->ads->getContentBottomLSNTContainer());
        $this->assertRegExp('/Fake LSNT Promotion Ad - 1/', $this->ads->getContentBottomLSNTContainer());
        $this->assertRegExp('/Fake LSNT Promotion Ad - 2/', $this->ads->getContentBottomLSNTContainer());
        $this->assertRegExp('/Fake LSNT Promotion Ad - 3/', $this->ads->getContentBottomLSNTContainer());
    }
}
