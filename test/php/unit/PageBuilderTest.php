<?php

class PageBuilderTest extends PHPUnit_Framework_TestCase 
{

    private $sourceDirectory, $controller;

    public function setUp() 
    {
        $this->sourceDirectory = SOURCE_DIRECTORY;
        $this->packages = array(
            'Toys' => array (
                'LEGO' => array (
                    'Star Wars' => array (
                        '4567' => array (
                        
                        )
                    )
                )
            ),
            'Vehicles' => array (
                '2015' => array (
                    'Toyota' => array (
                        'Tacoma' => array (
                        
                        )
                    )
                )
            )
        );
        $this->controller = new PageBuilder();
    }

    public function testSourceDirectoryCreation() 
    {
        $newDirectory = format_directory($this->sourceDirectory, 'index.html');
        $this->assertTrue(file_exists($newDirectory));

        $this->assertRegExp('/Learn Something New Today/', file_get_contents($newDirectory));
    }

    public function testPackageDirectoryCreation() 
    {
        $newDirectory = format_directory($this->sourceDirectory, 'Toys/index.html');
        $this->assertTrue(file_exists($newDirectory), $newDirectory);
        $this->assertRegExp('/Learn Something New Today/', file_get_contents($newDirectory));

        $newDirectory = format_directory($this->sourceDirectory, 'Vehicles/index.html');
        $this->assertTrue(file_exists($newDirectory));
        $this->assertRegExp('/Learn Something New Today/', file_get_contents($newDirectory));
    }

    public function testClassDirectoryCreation() 
    {
        $newDirectory = format_directory($this->sourceDirectory, 'Toys/LEGO/index.html');
        $this->assertTrue(file_exists($newDirectory));
        $this->assertRegExp('/Learn Something New Today/', file_get_contents($newDirectory));

        $newDirectory = format_directory($this->sourceDirectory, 'Vehicles/2015/index.html');
        $this->assertTrue(file_exists($newDirectory));
        $this->assertRegExp('/Learn Something New Today/', file_get_contents($newDirectory));
    }

    public function testFamilyDirectoryCreation() 
    {
        $newDirectory = format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/index.html');
        $this->assertTrue(file_exists($newDirectory));
        $this->assertRegExp('/Learn Something New Today/', file_get_contents($newDirectory));

        $newDirectory = format_directory($this->sourceDirectory, 'Vehicles/2015/Toyota/index.html');
        $this->assertTrue(file_exists($newDirectory));
        $this->assertRegExp('/Learn Something New Today/', file_get_contents($newDirectory));
    }

    public function testItemCreation() 
    {
        $newDirectory = format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/4567/index.html');
        $this->assertTrue(file_exists($newDirectory));
        $this->assertRegExp('/Learn Something New Today/', file_get_contents($newDirectory));

        $newDirectory = format_directory($this->sourceDirectory, 'Vehicles/2015/Toyota/Tacoma/index.html');
        $this->assertTrue(file_exists($newDirectory));
        $this->assertRegExp('/Learn Something New Today/', file_get_contents($newDirectory));
    }

    public function tearDown()
    {
        if (preg_match('/shadowSrc$/', $this->sourceDirectory)) {
            shell_exec("rm -rf {$this->sourceDirectory}");
        }
    }
}

