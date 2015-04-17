<?php

class PackageTest extends PHPUnit_Framework_TestCase 
{

    private $packageModel, $package, $item;

    public function setUp() 
    {
        $this->packageModel = new PackageModel();
        $this->packageModel->getPackageItems(1);

        $this->package = new Package(
            $this->packageModel->result->fetch_object()
        );

        $this->item = $this->package->getItems()[0];

    }

    public function testPackageTitle() 
    {
        $this->assertEquals($this->package->getPackageTitle(), 'Top Ten Star Wars Sets');
    }

    public function testItemTitle() 
    {
        $this->assertEquals($this->item->getTitle(), '4567 item title');
    }

    public function testItemDescription() 
    {
        $this->assertEquals($this->item->getDescription(), '4567 description');
    }

    public function testItemImageUrl() 
    {
        $this->assertEquals($this->item->getImageUrl(), 'image');
    }

    public function testItemBulletPoint() 
    {
        $this->assertEquals($this->item->bulletPoints->getBulletPointOne(), 'Bullet Point 1');
    }
}
