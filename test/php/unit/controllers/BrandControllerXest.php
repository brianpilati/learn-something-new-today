<?php

class SubCategoryControllerTest extends PHPUnit_Framework_TestCase 
{
    private $brand;

    public function setUp() 
    {
    }

    public function testGetSuccess() 
    {
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->brand = new BrandController();
        $this->assertEquals(test_http_response_code(), 200);
        $allOutput = json_decode(get_ob(), true);
        $output = $allOutput[0];
        $this->assertEquals($output['brandId'], '1');
        $this->assertEquals($output['brand'], 'Toys');

        $this->assertEquals(sizeof($output), 2);
    }

    public function testPostSuccess() 
    {
        $_POST = array (
            'brand' => 'New Brand'
            'subCategoryId' => '1'
        );
        $_SERVER['REQUEST_METHOD'] = "POST";
        $this->brand = new BrandController();
        $this->assertEquals(test_http_response_code(), 201);
    }

    public function testError() 
    {
        $_SERVER['REQUEST_METHOD'] = "delete";
        $this->brand = new BrandController();
        $this->assertEquals(test_http_response_code(), 405);
    }
}

