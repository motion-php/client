<?php

declare(strict_types=1);

namespace Motion\ValueObjects;

use Motion\Contracts\StringableContract;

final class ApiKey implements StringableContract
{
    public function __construct(public readonly string $apiKey)
    {
        //..
    }

    public static function from(string $apiKey): self
    {
        return new self($apiKey);
    }

    public function toString(): string
    {
        return $this->apiKey;
    }
}
