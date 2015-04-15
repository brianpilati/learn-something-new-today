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
        $this->assertEquals($this->siteMapLink->getLink(), 'The Link');
    }

    public function testGetText()
    {
        $this->assertEquals($this->siteMapLink->getText(), 'My Text');
    }

    public function testGetAlt()
    {
        $this->assertEquals($this->siteMapLink->getAlt(), 'My Alt Tag');
    }
}
