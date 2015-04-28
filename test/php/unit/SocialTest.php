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

    public function testGetPinterestPackages()
    {
        $pinterest = $this->social->getPinterest('/my_new_page', '/my_new_image', 'my description');
        $this->assertContains('url=http://test.site/my_new_page', $pinterest);
        $this->assertContains('media=http://test.site/my_new_image', $pinterest);
        $this->assertContains('description=my description', $pinterest);
    }

    public function testGetPinterestSiteMap()
    {
        $pinterest = $this->social->getPinterest('');
        $this->assertContains('url=http://test.site', $pinterest);
        $this->assertNotContains('media', $pinterest);
        $this->assertNotContains('description', $pinterest);
    }
}
