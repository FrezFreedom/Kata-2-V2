<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once(__DIR__. '/../StringCalculator.php');
require_once(__DIR__. '/../Tokenizer.php');
require_once(__DIR__. '/../ParserMain.php');

final class StringCalculatorTest extends TestCase
{
    /**
     * @dataProvider provideStringCalculatorClassData
     */
    public function testAddFunction($expected_ans, $ans): void
    {
        $this->assertEquals($expected_ans, $ans);
    }

    public static function provideStringCalculatorClassData()
    {
        $tokenizer = new Tokenizer();
        $parser = new ParserMain($tokenizer);
        $stringCalculator = new StringCalculator($parser);

        // ---------------------------------------------------------
        $ans = $stringCalculator->add('1,2');

        yield [
            3,
            $ans,
        ];

        // ---------------------------------------------------------
        $ans = $stringCalculator->add('1,4');

        yield [
            5,
            $ans,
        ];

        // ---------------------------------------------------------
        $ans = $stringCalculator->add('10');

        yield [
            10,
            $ans,
        ];

        // ---------------------------------------------------------
        $ans = $stringCalculator->add('');

        yield [
            0,
            $ans,
        ];

        // ---------------------------------------------------------
        $ans = $stringCalculator->add('10,4,20,30');

        yield [
            64,
            $ans,
        ];

        // ---------------------------------------------------------
        $ans = $stringCalculator->add('1,2\n3');

        yield [
            6,
            $ans,
        ];

        // ---------------------------------------------------------
        $ans = $stringCalculator->add('1,2\n3');

        yield [
            6,
            $ans,
        ];
    }


//    public function testCustomParserExceptionOfAddFunction(): void
//    {
//        $this->expectException(CustomParserException::class);
//        $this->expectExceptionMessage('Consecutive delimiter tokens');
//
//        $tokenizer = new Tokenizer();
//        $parser = new ParserMain($tokenizer);
//        $stringCalculator = new StringCalculator($parser);
//
//        $ans = $stringCalculator->add('1,2');
//    }

}