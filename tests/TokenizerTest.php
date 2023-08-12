<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../Tokenizer.php');
require_once(__DIR__. '/../Token.php');

final class EmailTest extends TestCase
{
    public function testTokenizerClass(): void
    {
        $str = '1,2';
        $expected_tokens = [];
        $expected_tokens[] = new Token(Token::TYPE_NUMBER, '1');
        $expected_tokens[] = new Token(Token::TYPE_DELIMITER, ',');
        $expected_tokens[] = new Token(Token::TYPE_NUMBER, '2');
        $tokenizer = new Tokenizer();
        $tokens = $tokenizer->tokenize($str);
        $this->assertEquals($expected_tokens, $tokens);
    }
}
