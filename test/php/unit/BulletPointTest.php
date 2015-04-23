<?php

class BulletPointTest extends PHPUnit_Framework_TestCase 
{

    private $bulletPoint;

    public function setUp() 
    {
        $this->bulletPoint = new BulletPoint(1);
    }

    public function testIsBulletPointOne() 
    {
        $this->assertTrue($this->bulletPoint->isBulletPointOne());
    }

    public function testGetBulletPointOne() 
    {
        $this->assertEquals($this->bulletPoint->getBulletPointOne(), 'Played by Robert Downey, Jr. this is the max number of letters for a bullet point and it i');
    }

    public function testIsBulletPointTwo() 
    {
        $this->assertTrue($this->bulletPoint->isBulletPointTwo());
    }

    public function testGetBulletPointTwo() 
    {
        $this->assertEquals($this->bulletPoint->getBulletPointTwo(), 'Bullet Point 2');
    }

    public function testIsBulletPointThree() 
    {
        $this->assertTrue($this->bulletPoint->isBulletPointThree());
    }

    public function testGetBulletPointThree() 
    {
        $this->assertEquals($this->bulletPoint->getBulletPointThree(), 'Bullet Point 4');
    }

    public function testIsBulletPointFour() 
    {
        $this->assertTrue($this->bulletPoint->isBulletPointFour());
    }

    public function testGetBulletPointFour() 
    {
        $this->assertEquals($this->bulletPoint->getBulletPointFour(), 'Bullet Point 3');
    }

    public function testGetTotalBulletPoints() 
    {
        $this->assertEquals($this->bulletPoint->getCount(), 4);
    }

    public function testSecondItem() {
        $this->bulletPoint = new BulletPoint(2);

        $this->assertTrue($this->bulletPoint->isBulletPointOne());
        $this->assertEquals($this->bulletPoint->getBulletPointOne(), 'Bullet Point 1');
        $this->assertTrue($this->bulletPoint->isBulletPointTwo());
        $this->assertEquals($this->bulletPoint->getBulletPointTwo(), 'Bullet Point 2');
        $this->assertFalse($this->bulletPoint->isBulletPointThree());
        $this->assertNull($this->bulletPoint->getBulletPointThree());
        $this->assertFalse($this->bulletPoint->isBulletPointFour());
        $this->assertNull($this->bulletPoint->getBulletPointFour());
        $this->assertEquals($this->bulletPoint->getCount(), 2);
    }
}
