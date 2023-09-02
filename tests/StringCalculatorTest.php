<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    public function testAddfunction()
    {
        $stringCalculator = new StringCalculator();
        $ans = $stringCalculator->add('1,2');

        $this->assertEquals(3, $ans);
    }
}