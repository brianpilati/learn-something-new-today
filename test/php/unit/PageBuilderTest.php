<?php

class PageBuilderTest extends PHPUnit_Framework_TestCase 
{

    private $sourceDirectory;

    public function setUp() 
    {
        $this->sourceDirectory = SOURCE_DIRECTORY;
        new PageBuilder();
    }

    public function testSourceDirectoryCreation() 
    {
        $this->validateContent($this->sourceDirectory);
    }

    public function testPackageDirectoryCreation() 
    {
        $this->validateContent(format_directory($this->sourceDirectory, 'Toys'));
        
        $this->validateContent(format_directory($this->sourceDirectory, 'Vehicles'));
    }

    public function testClassDirectoryCreation() 
    {
        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO'));

        $this->validateContent(format_directory($this->sourceDirectory, 'Vehicles/2015'));
    }

    public function testFamilyDirectoryCreation() 
    {
        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars'));

        $this->validateContent(format_directory($this->sourceDirectory, 'Vehicles/2015/Toyota'));
    }

    public function testItemCreation() 
    {
        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/4567'));

        $this->validateContent(format_directory($this->sourceDirectory, 'Vehicles/2015/Toyota/Tacoma'));
    }

    public function tearDown()
    {
        if (preg_match('/shadowSrc$/', $this->sourceDirectory)) {
            shell_exec("rm -rf {$this->sourceDirectory}");
        }
    }

    public function getFileGroup($file) {
        return posix_getgrgid(filegroup($file))['name'];
    }
    
    public function getFilePerms($file) {
        return substr(sprintf('%o', fileperms($file)), -4);
    }

    public function validateContent($directory) {
        $file = format_directory($directory, 'index.html');
        $this->assertTrue(file_exists($directory));
        $this->assertTrue(file_exists($file));
        $this->assertRegExp('/Learn Something New Today/', file_get_contents($file));
        $this->assertEquals($this->getFileGroup($file), '_www');
        $this->assertEquals($this->getFilePerms($file), '0755');

        $this->assertEquals($this->getFileGroup($directory), '_www');
        $this->assertEquals($this->getFilePerms($directory), '0755');

    }
}

