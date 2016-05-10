<?php

class WordcounterTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        require_once '../wordcounter.php';
    }

    /**
     * @covers ::wordcounter
     * @dataProvider provider
     */
    public function testWordcounter($comment, $count, $string)
    {
        $this->assertEquals($count, wordcounter($string), true);
    }

    public function provider()
    {
        $data = [];

        // table
        foreach (scandir('data/table') as $filename)
        {
            if (!preg_match('#^(\d)_(\d+)\.txt$#', $filename, $matches))
            {
                continue;
            }

            $comment = 'table-'.$matches[1];
            $count = $matches[2];
            $string = file_get_contents('data/table/'.$filename);

            $data[$comment] = [$comment, $count, $string];
        }

        return $data;
    }
}
