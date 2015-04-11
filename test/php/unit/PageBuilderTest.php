<?php

class PageBuilderTest extends PHPUnit_Framework_TestCase 
{

    public function setUp() 
    {
    }

    public function testPageCreation() 
    {
        $this->controller = new PageBuilder();
        $this->assertEquals($this->controller->category, 'Toys');
    }
}

