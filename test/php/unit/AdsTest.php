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
        $this->assertEquals($this->ads->getHeaderAd(), 'Google Header Ad');
    }

    public function testGetMarqueeAd()
    {
        $this->assertEquals($this->ads->getMarqueeAd(), 'Amazon Marquee Ad');
    }

    public function testGetMainTopAd()
    {
        $this->assertEquals($this->ads->getMainTopAd(), 'Google Top Ad');
    }

    public function testGetMainMiddleAd()
    {
        $this->assertEquals($this->ads->getMainMiddleAd(), 'Google Middle Ad');
    }

    public function testGetMainBottomAd()
    {
        $this->assertEquals($this->ads->getMainBottomAd(), 'Amazon Bottom Ad');
    }

    public function testGetBottomLeftAd()
    {
        $this->assertEquals($this->ads->getBottomLeftAd(), 'Google Left Text Ad');
    }

    public function testGetBottomCenterAd()
    {
        $this->assertEquals($this->ads->getBottomCenterAd(), 'Google Center Text Ad');
    }

    public function testGetBottomRightAd()
    {
        $this->assertEquals($this->ads->getBottomRightAd(), 'Google Right Text Ad');
    }

    public function testGetLSNTPromotionAd()
    {
        $this->assertEquals($this->ads->getLSNTPromotionAd(22), 'LSNT Promotion Ad - 22');
    }
}
