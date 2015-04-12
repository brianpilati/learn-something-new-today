<?php

class PackageTest extends PHPUnit_Framework_TestCase 
{

    private $packageObj, $package;

    public function setUp() 
    {
        $this->packageModel = new PackageModel();
        $this->packageModel->getAll();

        $this->package = new Package(
            $this->packageModel->result->fetch_object()
        );
    }

    public function testPackageTitle() 
    {
        $this->assertEquals($this->package->getPackageTitle(), 'Top Ten Star Wars Sets');
    }

    public function testItemTitle() 
    {
        $this->assertEquals($this->package->getItemTitle(), '4567 item title');
    }

    public function testItemDescription() 
    {
        $this->assertEquals($this->package->getItemDescription(), '4567 description');
    }

    public function testItemImageUrl() 
    {
        $this->assertEquals($this->package->getItemImageUrl(), 'image');
    }
}
