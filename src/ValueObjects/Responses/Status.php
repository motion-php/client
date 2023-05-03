<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class Status implements CreateFromArrayContract
{
    public function __construct(
        public readonly string $name,
        public readonly bool $isDefaultStatus,
        public readonly bool $isResolvedStatus,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            name: $attributes['name'],
            isDefaultStatus: $attributes['isDefaultStatus'],
            isResolvedStatus: $attributes['isResolvedStatus'],
        );
    }

    /**
     * @return array{name: string, isDefaultStatus: bool, isResolvedStatus: bool}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'isDefaultStatus' => $this->isDefaultStatus,
            'isResolvedStatus' => $this->isResolvedStatus,
        ];
    }
}
