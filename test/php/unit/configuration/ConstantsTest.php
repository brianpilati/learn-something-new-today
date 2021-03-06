<?php

class ConstantsTest extends PHPUnit_Framework_TestCase 
{

    public function setUp() 
    {
    }

    public function testSiteName() 
    {
        $this->assertEquals(SITE_NAME, 'LSNT - Site Name');
    }

    public function testSiteCatchPhrase() 
    {
        $this->assertEquals(CATCH_PHRASE, 'LSNT - Catch Phrase');
    }

    public function testSiteTwitterHandle() 
    {
        $this->assertEquals(SITE_TWITTER_HANDLE, 'LSNT - Twitter');
    }

    public function testSiteTitle() 
    {
        $this->assertEquals(SITE_TITLE, 'LSNT');
    }

    public function testSiteUrl() 
    {
        $this->assertEquals(SITE_URL, 'http://test.site');
    }

    public function testDBHost() 
    {
        $this->assertEquals(DB_HOST, 'localhost');
    }

    public function testDBName() 
    {
        $this->assertEquals(DB_NAME, 'lsnt_test');
    }

    public function testDBUser() 
    {
        $this->assertEquals(DB_USER, 'lsnt_test');
    }

    public function testSourceDirectory() 
    {
        $this->assertRegExp('/test\/php\/shadowSrc/', SOURCE_DIRECTORY);
    }

    public function testTitleAd() 
    {
        $this->assertFalse(HEADER_AD);
    }

    public function testHeaderAd() 
    {
        $this->assertFalse(HEADER_AD);
    }

    public function testMarqueeAd() 
    {
        $this->assertFalse(MARQUEE_AD);
    }

    public function testMainTopAd() 
    {
        $this->assertFalse(MAIN_TOP_AD);
    }

    public function testMainMiddleAd() 
    {
        $this->assertFalse(MAIN_MIDDLE_AD);
    }

    public function testMainBottomAd() 
    {
        $this->assertFalse(MAIN_BOTTOM_AD);
    }

    public function testBottomLeftAd() 
    {
        $this->assertFalse(BOTTOM_LEFT_AD);
    }

    public function testBottomCenterAd() 
    {
        $this->assertFalse(BOTTOM_CENTER_AD);
    }

    public function testBottomRightAd() 
    {
        $this->assertFalse(BOTTOM_RIGHT_AD);
    }

    public function testLSNTAd() 
    {
        $this->assertFalse(LSNT_PROMOTION_ADS);
    }
}
