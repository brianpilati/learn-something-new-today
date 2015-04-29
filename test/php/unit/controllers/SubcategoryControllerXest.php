<?php

class SubCategoryControllerTest extends PHPUnit_Framework_TestCase 
{
    private $subCategory;

    public function setUp() 
    {
    }

    public function testGetSuccess() 
    {
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->subCategory = new SubcategoryController();
        $this->assertEquals(test_http_response_code(), 200);
        $allOutput = json_decode(get_ob(), true);
        $output = $allOutput[0];
        $this->assertEquals($output['subCategoryId'], '1');
        $this->assertEquals($output['subCategory'], 'Toys');

        $this->assertEquals(sizeof($output), 2);
    }

    public function testPostSuccess() 
    {
        $_POST = array (
            'subCategory' => 'New Category'
            'categoryId' => '1'
        );
        $_SERVER['REQUEST_METHOD'] = "POST";
        $this->subCategory = new SubcategoryController();
        $this->assertEquals(test_http_response_code(), 201);
    }

    public function testError() 
    {
        $_SERVER['REQUEST_METHOD'] = "delete";
        $this->subCategory = new SubcategoryController();
        $this->assertEquals(test_http_response_code(), 405);
    }
}

