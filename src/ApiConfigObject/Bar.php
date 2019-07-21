<?php

namespace App\ApiConfigObject;

class Bar implements ConfigObjectInterface
{
    private $code;

    public function __construct(string $code)
    {
        $this->code = $code;

        dump($code);
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
