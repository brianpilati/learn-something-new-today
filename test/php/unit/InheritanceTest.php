<?php

class InheritanceTest extends PHPUnit_Framework_TestCase 
{
    private $inheritance;

    public function setUp() 
    {
        $this->inheritance = new Inheritance();

    }

    public function testSiteName() 
    {
        $this->assertEquals($this->inheritance->getSiteName(), "LSNT - Site Name");
    }

    public function testSiteTwitterHandle() 
    {
        $this->assertEquals($this->inheritance->getTwitterHandle(), "LSNT - Twitter");
    }

    public function testGetLogo() 
    {
        $this->assertContains('LSNT - Site Name Home Page', $this->inheritance->getLogo());
    }
}
