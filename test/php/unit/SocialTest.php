<?php

class SocialTest extends PHPUnit_Framework_TestCase 
{

    private $social;

    public function setUp() 
    {
        $this->social = new Social();
    }

    public function testGetFacebook()
    {
        $this->assertEquals($this->social->getFacebook(), 'fb-s');
    }

    public function testGetTwitter()
    {
        $this->assertEquals($this->social->getTwitter(), 'tw-s');
    }

    public function testGetPinterest()
    {
        $this->assertEquals($this->social->getPinterest(), 'pi-s');
    }
}
