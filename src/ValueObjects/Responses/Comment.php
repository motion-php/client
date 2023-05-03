<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class Comment implements CreateFromArrayContract
{
    public function __construct(
        public readonly string $id,
        public readonly string $taskId,
        public readonly string $content,
        public readonly User $creator,
        public readonly string $createdAt,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            id: $attributes['id'],
            taskId: $attributes['taskId'],
            content: $attributes['content'],
            creator: User::from($attributes['creator']),
            createdAt: $attributes['createdAt'],
        );
    }

    /**
     * @return array{id: string, taskId: string, content: string, creator: mixed[], createdAt: string}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'taskId' => $this->taskId,
            'content' => $this->content,
            'creator' => $this->creator->toArray(),
            'createdAt' => $this->createdAt,
        ];
    }
}
