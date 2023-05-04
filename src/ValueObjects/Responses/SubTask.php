<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class SubTask implements CreateFromArrayContract
{
    public function __construct(
        public readonly string $name,
        public readonly bool $completed,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            name: $attributes['name'],
            completed: $attributes['completed'],
        );
    }

    /**
     * @return array{name: string, completed: bool}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'completed' => $this->completed,
        ];
    }
}
