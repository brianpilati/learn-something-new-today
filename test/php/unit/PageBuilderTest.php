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
                    'Star Wars' => array ()
                )
            ),
            'Vehicles' => array (
                '2015' => array (
                    'Toyota' => array ()
                )
            )
        );
        $this->controller = new PageBuilder();
    }

    public function testSourceDirectoryCreation() 
    {
        $this->assertTrue(file_exists($this->sourceDirectory));
    }

    public function testPackageDirectoryCreation() 
    {
        foreach($this->packages as $package => $packageObject) {
            $newDirectory = format_directory($this->sourceDirectory, $package);
            $this->assertTrue(file_exists($newDirectory));
        }
    }

    public function testClassDirectoryCreation() 
    {
        foreach($this->packages as $package => $packageObject) {
            $packageDirectory = format_directory($this->sourceDirectory, $package);
            foreach($packageObject as $class => $family) {
                $newDirectory = format_directory($packageDirectory, $class);
                $this->assertTrue(file_exists($newDirectory));
            }
        }
    }

    public function testFamilyDirectoryCreation() 
    {
        foreach($this->packages as $package => $packageObject) {
            $packageDirectory = format_directory($this->sourceDirectory, $package);
            foreach($packageObject as $class => $familyObject) {
                $classDirectory = format_directory($packageDirectory, $class);
                foreach($familyObject as $family => $itemObject) {
                    $newDirectory = format_directory($classDirectory, $family);
                    $this->assertTrue(file_exists($newDirectory), "'$newDirectory' does not exist");
                }
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

