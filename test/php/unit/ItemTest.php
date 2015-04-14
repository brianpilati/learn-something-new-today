<?php

class ItemTest extends PHPUnit_Framework_TestCase 
{

    private $itemModel, $package;

    public function setUp() 
    {
        $this->itemModel = new ItemModel();
        $this->itemModel->getAll();

        $this->package = new Package(
            $this->itemModel->result->fetch_object()
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
