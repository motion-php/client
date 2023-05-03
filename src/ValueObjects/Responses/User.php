<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class User implements CreateFromArrayContract
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $email
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            id: $attributes['id'],
            name: $attributes['name'],
            email: $attributes['email'],
        );
    }

    /**
     * @return array{id: string, name: string, email: string}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
