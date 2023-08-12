<?php

class Token
{
    public const TYPE_NUMBER = 1;
    public const TYPE_DELIMITER = 2;

    public int $type;
    public string $content;

    public function __construct(int $type, string $content)
    {
        $this->type = $type;
        $this->content = $content;
    }

    public function equals(Token $other): bool
    {
        return $this->type === $other->type && $this->content === $other->content;
    }
}
