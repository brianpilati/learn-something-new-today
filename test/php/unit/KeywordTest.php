<?php

class KeywordTest extends PHPUnit_Framework_TestCase 
{

    private $keyword;

    public function setUp() 
    {
        $this->keyword = new Keyword(1, 1);
    }

    public function testKeywords() 
    {
        $this->assertEquals($this->keyword->getKeywords(), 'Building Blocks, LEGO, Star Wars, Top Ten Star Wars Sets, Toys, LSNT - Catch Phrase');
    }
}
