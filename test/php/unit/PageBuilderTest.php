<?php

class PageBuilderTest extends PHPUnit_Framework_TestCase 
{

    private $sourceDirectory, $controller;

    public function setUp() 
    {
        $this->sourceDirectory = SOURCE_DIRECTORY;
        $this->categories = array(
            'Toys' => array (
                'Building Blocks' => array ()
            ), 
            'Vehicles' => array (
                'Truck' => array ()
            ) 
        );
        $this->controller = new PageBuilder();
    }

    public function testSourceDirectoryCreation() 
    {
        $this->assertTrue(file_exists($this->sourceDirectory));
    }

    public function testCategoryDirectoryCreation() 
    {
        foreach($this->categories as $category => $subCategory) {
            $newDirectory = format_directory($this->sourceDirectory, $category);
            $this->assertTrue(file_exists($newDirectory));
        }
    }

    public function testSubCategoryDirectoryCreation() 
    {
        foreach($this->categories as $category => $subCategory) {
            $categoryDirectory = format_directory($this->sourceDirectory, $category);
            foreach($subCategory as $subCategory => $brand) {
                $newDirectory = format_directory($categoryDirectory, $subCategory);
                $this->assertTrue(file_exists($newDirectory));
            }
        }
    }

    public function tearDown()
    {
        if (preg_match('/shadowSrc$/', $this->sourceDirectory)) {
            shell_exec("rm -rf {$this->sourceDirectory}");
        }
    }
}

