<?php

require_once('ParserInterface.php');
require_once('Tokenizer.php');

class ParserMain implements ParserInterface
{
    public function __construct(private Tokenizer $tokenizer)
    {

    }

    public function parseIt(string $mathPhrase)
    {
        $tokens = $this->tokenizer->tokenize($mathPhrase);

        $numbers = [];
        foreach ($tokens as $token)
        {
            if($token->type == Token::TYPE_NUMBER)
            {
                $numbers[] = intval($token->content);
            }
        }

        return $numbers;
    }
}