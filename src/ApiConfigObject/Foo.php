<?php

namespace App\ApiConfigObject;

class Foo implements ConfigObjectInterface
{
    private $code;

    public function __construct(string $code)
    {
        $this->code = $code;

        dump('class ' . __CLASS__ . ' initialized');
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
