<?php

class CTAPackageTest extends PHPUnit_Framework_TestCase 
{

    private $ctaPackages;

    public function setUp() 
    {
        $this->ctaPackages = new CTAPackages(1);
    }

    public function testGetPackages() 
    {
        $this->assertEquals(sizeof($this->ctaPackages->getPackages()), 2);
    }
}
