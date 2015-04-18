<?php

class ItemTest extends PHPUnit_Framework_TestCase 
{
    private $item;

    public function setUp() 
    {
        $this->item = new Item(1);
    }

    public function testTitle() 
    {
        $this->assertEquals($this->item->getTitle(), "4567 item title");
    }

    public function testDescription() 
    {
        $this->assertEquals($this->item->getDescription(), "4567 description");
    }

    public function testImageUrl() 
    {
        $this->assertEquals($this->item->getImageUrl(), "image");
    }

    public function testId() 
    {
        $this->assertEquals($this->item->getId(), "1");
    }

    public function testDisplayOrder() 
    {
        $this->assertNull($this->item->getDisplayOrder());
    }

    public function testGetPreviousItem() 
    {
        $this->assertNull($this->item->getPreviousItem());
    }

    public function testGetNextItem() 
    {
        $this->assertNull($this->item->getNextItem());
    }

    public function testSetGetPreviousItem() 
    {
        $this->item->setPreviousItem('234');
        $this->assertEquals($this->item->getPreviousItem(), '234.html');
    }

    public function testSetGetNextItem() 
    {
        $this->item->setNextItem('567');
        $this->assertEquals($this->item->getNextItem(), '567.html');
    }

    public function testBulletPoint() 
    {
        $this->assertEquals($this->item->bulletPoints->getBulletPointOne(), 'Bullet Point 1');
    }
}
