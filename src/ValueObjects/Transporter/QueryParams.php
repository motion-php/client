<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Transporter;

final class QueryParams
{
    /**
     * @param  array<string, mixed>  $params
     */
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

    /**
     * @param  array<string, mixed>  $params
     */
    public function withParams(array $params): self
    {
        return new self([
            ...$this->params,
            ...$params,
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->params;
    }
}
