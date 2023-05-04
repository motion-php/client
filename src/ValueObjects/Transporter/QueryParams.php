<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Transporter;

final class QueryParams
{
    public function __construct(private readonly array $params)
    {
        //..
    }

    public static function create(): self
    {
        return new self([]);
    }

    public function withParam(string $name, string|int $value): self
    {
        return new self([
            ...$this->params,
            $name => $value,
        ]);
    }

    public function toArray(): array
    {
        return $this->params;
    }
}
