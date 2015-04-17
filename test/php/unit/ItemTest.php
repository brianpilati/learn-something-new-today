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

    public function testBulletPoint() 
    {
        $this->assertEquals($this->item->bulletPoints->getBulletPointOne(), 'Bullet Point 1');
    }
}
