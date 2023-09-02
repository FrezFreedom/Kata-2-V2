<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once(__DIR__. '/../StringCalculator.php');
require_once(__DIR__. '/../Tokenizer.php');
require_once(__DIR__. '/../ParserMain.php');

final class StringCalculatorTest extends TestCase
{
    public function testAddFunction()
    {
        $tokenizer = new Tokenizer();
        $parser = new ParserMain($tokenizer);

        $stringCalculator = new StringCalculator($parser);
        $ans = $stringCalculator->add('1,2');

        $this->assertEquals(3, $ans);
    }
}