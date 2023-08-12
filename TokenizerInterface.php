<?php

interface TokenizerInterface
{
    public function tokenize(string $str): array;
}