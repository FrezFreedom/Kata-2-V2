<?php

require_once('TokenizerInterface.php');
require_once('Token.php');

class Tokenizer implements TokenizerInterface
{
    public function tokenize(string $str): array
    {
        $tokens = [];

        $index = 0;

        while ($index < strlen($str))
        {
            if( $this->isFirstOfNumber($str, $index) )
            {
                $tokenContent = '';
                while( $index < strlen($str) && ! $this->isFirstOfDelimiter($str, $index))
                {
                    $tokenContent .= $str[$index];
                    $index++;
                }
                $tokens[] = new Token(Token::TYPE_NUMBER, $tokenContent);
            }
            else
            {
                $tokenContent = '';
                while( $index < strlen($str) && ! $this->isFirstOfNumber($str, $index))
                {
                    $tokenContent .= $str[$index];
                    $index++;
                }
                $tokens[] = new Token(Token::TYPE_DELIMITER, $tokenContent);
            }
        }

        return $tokens;
    }

    private function isFirstOfNumber(string $str, int $index): bool
    {
        if( ctype_digit($str[$index]) )
            return True;
        if( $index + 1 < strlen($str) && $str[$index] == '-' && ctype_digit($str[$index + 1]) )
            return True;
        return false;
    }

    private function isFirstOfDelimiter(string $str, int $index): bool
    {
        return ! $this->isFirstOfNumber($str, $index);
    }
}