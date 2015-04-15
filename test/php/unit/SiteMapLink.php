<?php

class SiteMapLinkTest extends PHPUnit_Framework_TestCase 
{

    private $siteMapLink;

    public function setUp() 
    {
        $this->siteMapLink = new SiteMapLink('The Link', 'My Text', 'My Alt Tag');
    }

    public function testGetLink()
    {
        $this->assertEquals($this->siteMapLink->getLink(), 'fb-s');
    }

    public function testGetTwitter()
    {
        $this->assertEquals($this->siteMapLink->getTwitter(), 'tw-s');
    }

    public function testGetPinterest()
    {
        $this->assertEquals($this->siteMapLink->getPinterest(), 'pi-s');
    }
}
