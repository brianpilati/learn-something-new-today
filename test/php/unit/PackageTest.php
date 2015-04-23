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

    public function testPackageLink() 
    {
        $this->assertEquals($this->package->getPackageLink(), '/Toys/LEGO/Star Wars/Top Ten Star Wars Sets');
    }

    public function testPackageDir() 
    {
        $this->assertEquals($this->package->getPackageDir(), 'Toys/LEGO/Star Wars/Top Ten Star Wars Sets');
    }

    public function testItemTitle() 
    {
        $this->assertEquals($this->item->getTitle(), 'Tony Stark aka IronMan');
    }

    public function testItemDescription() 
    {
        $this->assertEquals($this->item->getDescription(), "Tony is a co-leader of the Avengers. He is a self-described genius, billionaire, playboy, and philanthropist. He uses his genius and father's company, Stark Enterprises, to build weapons and electromechanical suits of armor. This is an attempt to add 255.");
    }

    public function testItemImageUrl() 
    {
        $this->assertEquals($this->item->getImageUrl(), 'tonyStarkIronMan.jpg');
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
        $this->assertEquals($this->item->bulletPoints->getBulletPointOne(), 'Played by Robert Downey, Jr. this is the max number of letters for a bullet point and it i');
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
