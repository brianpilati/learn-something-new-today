<?php

class CategoryControllerTest extends PHPUnit_Framework_TestCase 
{
    private $category;

    public function setUp() 
    {
    }

    public function testGetSuccess() 
    {
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->category = new CategoryController();
        $this->assertEquals(test_http_response_code(), 200);
        $allOutput = json_decode(get_ob(), true);
        $output = $allOutput[0];
        $this->assertEquals($output['categoryId'], '1');
        $this->assertEquals($output['category'], 'Toys');

        $this->assertEquals(sizeof($output), 2);
    }

    public function testPostSuccess() 
    {
        $_POST = array (
            'category' => 'New Category'
        );
        $_SERVER['REQUEST_METHOD'] = "POST";
        $this->category = new CategoryController();
        $this->assertEquals(test_http_response_code(), 201);
    }

    public function testError() 
    {
        $_SERVER['REQUEST_METHOD'] = "delete";
        $this->category = new CategoryController();
        $this->assertEquals(test_http_response_code(), 405);
    }
}

