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
        $packages = $this->ctaPackages->getPackages();
        $package = $packages[0];
        $this->assertEquals($package->getTitle(), 'Top Five Star Wars Sets');
        $package = $packages[1];
        $this->assertEquals($package->getTitle(), '2015 Toyota Vehicles');
    }
}
