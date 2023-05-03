<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class Project implements CreateFromArrayContract
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $workspaceId
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            id: $attributes['id'],
            name: $attributes['name'],
            description: $attributes['description'],
            workspaceId: $attributes['workspaceId'],
        );
    }

    /**
     * @return array{id: string, name: string, description: string, workspaceId: string}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'workspaceId' => $this->workspaceId,
        ];
    }
}
