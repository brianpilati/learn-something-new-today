<?php

class ControllerTest extends PHPUnit_Framework_TestCase 
{

    public function setUp() 
    {
    }

    public function testSuccess() 
    {
        $_SERVER['REQUEST_URI'] = "/controllers/category";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertEquals(test_http_response_code(), '200');
        $this->expectOutputRegex('/categoryId/');
    }

    public function testError() 
    {
        $_SERVER['REQUEST_URI'] = "/controllers/error";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->controller = new Controller();
        $this->controller->invoke();
        $this->assertEquals(test_http_response_code(), '404');
        $this->expectOutputRegex('//');
    }
}

