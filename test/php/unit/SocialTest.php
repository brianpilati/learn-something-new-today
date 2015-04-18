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
        $this->assertContains('lsntoday', $this->social->getFacebook());
    }

    public function testGetTwitter()
    {
        $this->assertContains('@lsnt', $this->social->getTwitter());
    }

    public function testGetPinterest()
    {
        $this->assertContains('url=http://test.site/my_new_page', $this->social->getPinterest('my_new_image', '/my_new_page'));
        $this->assertContains('media=my_new_image', $this->social->getPinterest('my_new_image', 'my_new_page'));
    }
}
