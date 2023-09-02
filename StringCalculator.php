<?php

require_once('ParserInterface.php');

class  StringCalculator
{
    public function __construct(private ParserInterface $parser)
    {
    }

    public function add(string $mathPhrase)
    {
        $numbers = $this->parser->parseIt($mathPhrase);
        $ans = 0;
        foreach ($numbers as $number)
        {
            $ans += $number;
        }
        return $ans;
    }
}