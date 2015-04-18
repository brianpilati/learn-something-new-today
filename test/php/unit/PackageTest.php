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
        $this->assertEquals($this->package->getTitle(), 'Top Ten Star Wars Sets');
    }

    public function testTotalItems() 
    {
        $this->assertEquals($this->package->getTotalItems(), '4');
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

    public function testItemId() 
    {
        $this->assertEquals($this->item->getId(), '1');
    }

    public function testDisplayOrder() 
    {
        $this->assertEquals($this->item->getDisplayOrder(), "1");
    }

    public function testItemBulletPoint() 
    {
        $this->assertEquals($this->item->bulletPoints->getBulletPointOne(), 'Bullet Point 1');
    }

    public function testNavigationFirstItem() 
    {
        $item = $this->package->getItems()[0];
        $this->assertNull($item->getPreviousItem());
        $this->assertEquals($item->getNextItem(), '3.html');
    }

    public function testNavigationSecondItem() 
    {
        $item = $this->package->getItems()[1];
        $this->assertEquals($item->getPreviousItem(), '1.html');
        $this->assertEquals($item->getNextItem(), '4.html');
    }

    public function testNavigationThirdItem() 
    {
        $item = $this->package->getItems()[2];
        $this->assertEquals($item->getPreviousItem(), '3.html');
        $this->assertEquals($item->getNextItem(), '5.html');
    }

    public function testNavigationFourthItem() 
    {
        $item = $this->package->getItems()[3];
        $this->assertEquals($item->getPreviousItem(), '4.html');
        $this->assertNull($item->getNextItem());
    }
}
