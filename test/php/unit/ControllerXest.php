<?php

class ControllerTest extends PHPUnit_Framework_TestCase 
{

    public function setUp() 
    {
    }

    public function testItemSuccess() 
    {
        $_SERVER['REQUEST_URI'] = "/domain/subject/group/item";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertEquals($this->controller->domain, 'domain');
        $this->assertEquals($this->controller->subject, 'subject');
        $this->assertEquals($this->controller->group, 'group');
        $this->assertEquals($this->controller->item, 'item');
        $this->assertEquals(http_response_code(), 200);
        $this->expectOutputRegex('/domain/');
    }

    public function testItemSlashSuccess() 
    {
        $_SERVER['REQUEST_URI'] = "/domain/subject/group/item/";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertEquals($this->controller->domain, 'domain');
        $this->assertEquals($this->controller->subject, 'subject');
        $this->assertEquals($this->controller->group, 'group');
        $this->assertEquals($this->controller->item, 'item');
        $this->assertEquals(http_response_code(), 200);
        $this->expectOutputRegex('//');
    }

    public function testGroupSuccess() 
    {
        $_SERVER['REQUEST_URI'] = "/domain/subject/group";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertEquals($this->controller->domain, 'domain');
        $this->assertEquals($this->controller->subject, 'subject');
        $this->assertEquals($this->controller->group, 'group');
        $this->assertFalse(ISSET($this->controller->item));
        $this->assertEquals(http_response_code(), 200);
        $this->expectOutputRegex('//');
    }

    public function testGroupSlashSuccess() 
    {
        $_SERVER['REQUEST_URI'] = "/domain/subject/group/";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertEquals($this->controller->domain, 'domain');
        $this->assertEquals($this->controller->subject, 'subject');
        $this->assertEquals($this->controller->group, 'group');
        $this->assertEquals($this->controller->item, '');
        $this->assertEquals(http_response_code(), 200);
        $this->expectOutputRegex('//');
    }

    public function testSubjectSuccess() 
    {
        $_SERVER['REQUEST_URI'] = "/domain/subject";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertEquals($this->controller->domain, 'domain');
        $this->assertEquals($this->controller->subject, 'subject');
        $this->assertFalse(ISSET($this->controller->group));
        $this->assertFalse(ISSET($this->controller->item));
        $this->assertEquals(http_response_code(), 200);
        $this->expectOutputRegex('//');
    }

    public function testSubjectSlashSuccess() 
    {
        $_SERVER['REQUEST_URI'] = "/domain/subject/";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertEquals($this->controller->domain, 'domain');
        $this->assertEquals($this->controller->subject, 'subject');
        $this->assertEquals($this->controller->group, '');
        $this->assertFalse(ISSET($this->controller->item));
        $this->assertEquals(http_response_code(), 200);
        $this->expectOutputRegex('//');
    }

    public function testDomainSuccess() 
    {
        $_SERVER['REQUEST_URI'] = "/domain";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertEquals($this->controller->domain, 'domain');
        $this->assertFalse(ISSET($this->controller->subject));
        $this->assertFalse(ISSET($this->controller->group));
        $this->assertFalse(ISSET($this->controller->item));
        $this->assertEquals(http_response_code(), 200);
        $this->expectOutputRegex('//');
    }

    public function testDomainSlashSuccess() 
    {
        $_SERVER['REQUEST_URI'] = "/domain/";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertEquals($this->controller->domain, 'domain');
        $this->assertEquals($this->controller->subject, '');
        $this->assertFalse(ISSET($this->controller->group));
        $this->assertFalse(ISSET($this->controller->item));
        $this->assertEquals(http_response_code(), 200);
        $this->expectOutputRegex('//');
    }

    public function testHostname() 
    {
        $_SERVER['REQUEST_URI'] = "";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertFalse(ISSET($this->controller->domain));
        $this->assertFalse(ISSET($this->controller->subject));
        $this->assertFalse(ISSET($this->controller->group));
        $this->assertFalse(ISSET($this->controller->item));
        $this->assertEquals(http_response_code(), 200);
        $this->expectOutputRegex('/Learn/');
    }

    public function testIndex() 
    {
        $_SERVER['REQUEST_URI'] = '/index.html';
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertFalse(ISSET($this->controller->domain));
        $this->assertFalse(ISSET($this->controller->subject));
        $this->assertFalse(ISSET($this->controller->group));
        $this->assertFalse(ISSET($this->controller->item));
        $this->assertEquals(http_response_code(), 200);
        $this->expectOutputRegex('//');
    }

    public function testIndexSlash() 
    {
        $_SERVER['REQUEST_URI'] = '/';
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertFalse(ISSET($this->controller->domain));
        $this->assertFalse(ISSET($this->controller->subject));
        $this->assertFalse(ISSET($this->controller->group));
        $this->assertFalse(ISSET($this->controller->item));
        $this->assertEquals(http_response_code(), 200);
        $this->expectOutputRegex('//');
    }
}

