<?php

class ItemTest extends PHPUnit_Framework_TestCase 
{
    private $item;

    public function setUp() 
    {
        $this->item = new Item(1, 1);
    }

    public function testTitle() 
    {
        $this->assertEquals($this->item->getTitle(), "Tony Stark aka IronMan");
    }

    public function testHtmlDescription() 
    {
        $this->assertEquals($this->item->getHtmlDescription(), "<div class='lsnt-description'>Tony is a co-leader of the Avengers. He is a self-described genius, billionaire, playboy, and philanthropist. He uses his genius and father's company, Stark Enterprises, to build weapons and electromechanical suits of armor. This is an attempt to add 255.</div>");
    }

    public function testMetaDescription() 
    {
        $this->assertEquals($this->item->getMetaDescription(), "Tony is a co-leader of the Avengers. He is a self-described genius, billionaire, playboy, and philanthropist. He uses his genius and father's company, Stark Enterprises, to build weapons and electromechanical suits of armor. This is an attempt to add 255.");
    }

    public function testImageUrl() 
    {
        $this->assertEquals($this->item->getImageUrl(), "/images/items/tonyStarkIronMan.jpg");
    }

    public function testId() 
    {
        $this->assertEquals($this->item->getId(), "1");
    }

    public function testDisplayOrder() 
    {
        $this->assertNull($this->item->getDisplayOrder());
    }

    public function testAltTag() 
    {
        $this->assertEquals($this->item->getAltTag(), "Tony Stark aka IronMan");
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
        $this->assertEquals($this->item->bulletPoints->getBulletPointOne(), 'Played by Robert Downey, Jr. this is the max number of letters for a bullet point and it i');
    }

    public function testKeywords() 
    {
        $this->assertEquals($this->item->getKeywords(), 'Building Blocks, LEGO, Star Wars, Top Ten Star Wars Sets, Toys, LSNT - Catch Phrase');
    }
}
