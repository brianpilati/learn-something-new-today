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

    public function testPinterestValidation() 
    {
        $this->assertContains('name="p:domain_verify"', $this->inheritance->getPinterestValidation());
        $this->assertContains('content="308654263fc91b72550f3b6c96369978"', $this->inheritance->getPinterestValidation());
    }

    public function testGetLogo() 
    {
        $this->assertContains('LSNT - Site Name Home Page', $this->inheritance->getLogo());
    }

    public function testGetDisclaimer() 
    {
        $this->assertContains('Copyright &copy', $this->inheritance->getDisclaimer());
    }

    public function testGetBodyClose() 
    {
        $this->assertContains('Google Analytics', $this->inheritance->getBodyClose());
    }
}
