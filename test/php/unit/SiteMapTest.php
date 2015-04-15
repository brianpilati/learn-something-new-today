<?php

class SiteMapTest extends PHPUnit_Framework_TestCase 
{

    private $siteMap;

    public function setUp() 
    {
        $this->siteMap = new SiteMap();
        $this->siteMap->setItem('The Link', 'My Text', 'My Alt Tag');
        $this->siteMap->setItem('The Link - 2', 'My Text - 2', 'My Alt Tag - 2');
    }

    public function testGetFirstItem()
    {
        $items = $this->siteMap->getSiteMap();
        $this->assertEquals($items[0]->getLink(), 'The Link');
        $this->assertEquals($items[0]->getText(), 'My Text');
        $this->assertEquals($items[0]->getAlt(), 'My Alt Tag');
    }

    public function testGetSecondItem()
    {
        $items = $this->siteMap->getSiteMap();
        $this->assertEquals($items[1]->getLink(), 'The Link - 2');
        $this->assertEquals($items[1]->getText(), 'My Text - 2');
        $this->assertEquals($items[1]->getAlt(), 'My Alt Tag - 2');
    }
}
