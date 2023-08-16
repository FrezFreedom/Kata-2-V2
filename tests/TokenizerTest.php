<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../Tokenizer.php');
require_once(__DIR__. '/../Token.php');

final class TokenizerTest extends TestCase
{
    /**
     * @dataProvider provideTokenizerClassData
     */
    public function testTokenizerClass($expected_tokens, $tokens): void
    {
        
        $this->assertEquals($expected_tokens, $tokens);
    }

    public static function provideTokenizerClassData()
    {
        $str = '1,2';
        $tokenizer = new Tokenizer();

        $expected_tokens = [
            new Token(Token::TYPE_NUMBER, '1'),
            new Token(Token::TYPE_DELIMITER, ','),
            new Token(Token::TYPE_NUMBER, '2'),
        ];
        
        $tokens = $tokenizer->tokenize($str);
        yield [
            $expected_tokens,
            $tokens,
        ];

        // ---------------------------------------------------------
        $str = '10,20,30';
        $expected_tokens = [
            new Token(Token::TYPE_NUMBER, '10'),
            new Token(Token::TYPE_DELIMITER, ','),
            new Token(Token::TYPE_NUMBER, '20'),
            new Token(Token::TYPE_DELIMITER, ','),
            new Token(Token::TYPE_NUMBER, '30'),
        ];

        $tokens = $tokenizer->tokenize($str);
        yield [
            $expected_tokens,
            $tokens,
        ];

        // ---------------------------------------------------------
        $str = '-10,20,30,-40';
        $expected_tokens = [
            new Token(Token::TYPE_NUMBER, '-10'),
            new Token(Token::TYPE_DELIMITER, ','),
            new Token(Token::TYPE_NUMBER, '20'),
            new Token(Token::TYPE_DELIMITER, ','),
            new Token(Token::TYPE_NUMBER, '30'),
            new Token(Token::TYPE_DELIMITER, ','),
            new Token(Token::TYPE_NUMBER, '-40'),
        ];

        $tokens = $tokenizer->tokenize($str);
        yield [
            $expected_tokens,
            $tokens,
        ];

        // ---------------------------------------------------------
        $str = '-10\n20,30\n-50,100';
        $expected_tokens = [
            new Token(Token::TYPE_NUMBER, '-10'),
            new Token(Token::TYPE_DELIMITER, '\n'),
            new Token(Token::TYPE_NUMBER, '20'),
            new Token(Token::TYPE_DELIMITER, ','),
            new Token(Token::TYPE_NUMBER, '30'),
            new Token(Token::TYPE_DELIMITER, '\n'),
            new Token(Token::TYPE_NUMBER, '-50'),
            new Token(Token::TYPE_DELIMITER, ','),
            new Token(Token::TYPE_NUMBER, '100'),
        ];

        $tokens = $tokenizer->tokenize($str);
        yield [
            $expected_tokens,
            $tokens,
        ];
    }

}
