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
        $filePath = format_directory($this->sourceDirectory, '');
        $this->validateContent($filePath);
        $this->assertRegExp('/Featured Today/', file_get_contents($this->getFileName($filePath)));
    }

    public function testPackageDirectoryCreation() 
    {
        $filePath = format_directory($this->sourceDirectory, 'Toys');
        $this->validateContent($filePath);
        $this->assertRegExp('/href="\/Toys\/LEGO\/index.html"/', file_get_contents($this->getFileName($filePath)));
        
        $filePath = format_directory($this->sourceDirectory, 'Vehicles');
        $this->validateContent($filePath);
        $this->assertRegExp('/href="\/Vehicles\/2015\/index.html"/', file_get_contents($this->getFileName($filePath)));
    }

    public function testClassDirectoryCreation() 
    {
        $filePath = format_directory($this->sourceDirectory, 'Toys/LEGO');
        $this->validateContent($filePath);
        $this->assertRegExp('/href="\/Toys\/LEGO\/Star Wars\/index.html"/', file_get_contents($this->getFileName($filePath)));

        $filePath = format_directory($this->sourceDirectory, 'Vehicles/2015');
        $this->validateContent($filePath);
        $this->assertRegExp('/href="\/Vehicles\/2015\/TOyota\/index.html"/', file_get_contents($this->getFileName($filePath)));
    }

    public function testFamilyDirectoryCreation() 
    {
        $filePath = format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars');
        $this->validateContent($filePath);
        $this->assertRegExp('/href="\/Toys\/LEGO\/Star Wars\/Top Five Star Wars Sets\/index.html"/', file_get_contents($this->getFileName($filePath)));
        $this->assertRegExp('/href="\/Toys\/LEGO\/Star Wars\/Top Ten Star Wars Sets\/index.html"/', file_get_contents($this->getFileName($filePath)));

        $filePath = format_directory($this->sourceDirectory, 'Vehicles/2015/Toyota');
        $this->validateContent($filePath);
        $this->assertRegExp('/href="\/Vehicles\/2015\/TOyota\/2015 Toyota Vehicles\/index.html"/', file_get_contents($this->getFileName($filePath)));
    }

    public function testItemCreation() 
    {
        $filePath = format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/Top Ten Star Wars Sets');
        $this->validateContent($filePath);
        $this->assertRegExp('/Tony Stark aka IronMan"/', file_get_contents($this->getFileName($filePath)));

        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/Top Ten Star Wars Sets'), '1.html');
        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/Top Ten Star Wars Sets'), '3.html');
        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/Top Ten Star Wars Sets'), '4.html');
        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/Top Ten Star Wars Sets'), '5.html');

        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/Top Five Star Wars Sets'));
        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/Top Five Star Wars Sets'), '1.html');
        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/Top Five Star Wars Sets'), '3.html');
        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/Top Five Star Wars Sets'), '4.html');
        $this->validateContent(format_directory($this->sourceDirectory, 'Toys/LEGO/Star Wars/Top Five Star Wars Sets'), '5.html');

        $filePath = format_directory($this->sourceDirectory, 'Vehicles/2015/Toyota/2015 Toyota Vehicles');
        $this->validateContent($filePath);
        $this->assertRegExp('/2015 Toyota Vehicles/', file_get_contents($this->getFileName($filePath)));
        $this->validateContent(format_directory($this->sourceDirectory, 'Vehicles/2015/Toyota/2015 Toyota Vehicles'), '2.html');
    }

    public function testSiteMapCreation() 
    {
        $filePath = format_directory($this->sourceDirectory, 'siteMap');
        $this->validateContent($filePath);
        $this->assertRegExp('/href="\/Toys\/index.html"/', file_get_contents($this->getFileName($filePath)));
        $this->assertRegExp('/href="\/Vehicles\/index.html"/', file_get_contents($this->getFileName($filePath)));
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

    public function validateContent($directory, $fileName="index.html") {
        $file = $this->getFileName($directory, $fileName);
        $this->assertTrue(file_exists($directory));
        $this->assertTrue(file_exists($file));
        $this->assertRegExp('/LSNT/', file_get_contents($file));
        $this->assertRegExp('/Google Analytics/', file_get_contents($file));
        $this->assertEquals($this->getFileGroup($file), '_www');
        $this->assertEquals($this->getFilePerms($file), '0755');

        $this->assertEquals($this->getFileGroup($directory), '_www');
        $this->assertEquals($this->getFilePerms($directory), '0755');

    }

    public function getFileName($directory, $fileName="index.html") {
        return format_directory($directory, $fileName);
    }
}

