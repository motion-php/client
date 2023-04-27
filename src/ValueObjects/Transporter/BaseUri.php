<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Transporter;

use Motion\Contracts\StringableContract;

/**
 * @internal
 */
final class BaseUri implements StringableContract
{
    /**
     * Creates a new Base URI value object.
     */
    public function __construct(private readonly string $baseUri)
    {
        //..
    }

    /**
     * Creates a new Base URI value object.
     */
    public static function from(string $baseUri): self
    {
        return new self($baseUri);
    }

    /**
     * {@inheritDoc}
     */
    public function toString(): string
    {
        foreach (['https://', 'http://'] as $protocol) {
            if (str_starts_with($this->baseUri, $protocol)) {
                return "{$this->baseUri}/";
            }
        }

        return "https://{$this->baseUri}/";
    }
}
