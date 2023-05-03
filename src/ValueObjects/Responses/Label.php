<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class Label implements CreateFromArrayContract
{
    public function __construct(public readonly string $name)
    {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            name: $attributes['name'],
        );
    }

    /**
     * @return array{name: string}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
