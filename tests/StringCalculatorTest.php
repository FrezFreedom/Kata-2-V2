<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once(__DIR__. '/../StringCalculator.php');

final class StringCalculatorTest extends TestCase
{
    public function testAddFunction()
    {
        $stringCalculator = new StringCalculator();
        $ans = $stringCalculator->add('1,2');

        $this->assertEquals(3, $ans);
    }
}