<?php

declare(strict_types=1);

namespace Motion\ValueObjects;

use Motion\Contracts\StringableContract;

/**
 * @internal
 */
final class ApiKey implements StringableContract
{
    /**
     * Create a new API key value object.
     */
    public function __construct(public readonly string $apiKey)
    {
        //..
    }

    /**
     * Create a new API key value object.
     */
    public static function from(string $apiKey): self
    {
        return new self($apiKey);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return $this->apiKey;
    }
}
