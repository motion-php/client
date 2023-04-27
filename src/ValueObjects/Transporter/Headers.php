<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Transporter;

use Motion\Enums\Transporter\ContentType;
use Motion\ValueObjects\ApiKey;

/**
 * @internal
 */
final class Headers
{
    /**
     * Creates a new Headers value object.
     *
     * @param  array<string, string>  $headers
     */
    public function __construct(private readonly array $headers)
    {
        //..
    }

    /**
     * Create a new Headers value object.
     */
    public static function create(): self
    {
        return new self([]);
    }

    /**
     * Creates a new Headers value object with the given API key.
     */
    public static function withAuthorization(ApiKey $apiKey): self
    {
        return new self([
            'X-API-Key' => $apiKey->toString(),
        ]);
    }

    /**
     * Creates a new Headers value object with the given content type.
     * Retains any existing headers.
     */
    public function withContentType(ContentType $contentType): self
    {
        return new self([
            ...$this->headers,
            'Content-Type' => $contentType->value,
        ]);
    }

    /**
     * Creates a new Headers value object with the given custom header.
     * Retains any existing headers.
     */
    public function withCustomHeader(string $name, string $value): self
    {
        return new self([
            ...$this->headers,
            $name => $value,
        ]);
    }

    /**
     * @return array<string, string> $headers
     */
    public function toArray(): array
    {
        return $this->headers;
    }
}
