<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

final class Meta
{
    public function __construct(
        public readonly string $nextCursor,
        public readonly int|string|float $pageSize
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            nextCursor: $attributes['nextCursor'],
            pageSize: $attributes['pageSize'],
        );
    }

    /**
     * @return array{nextCursor: string, pageSize: int|string}
     */
    public function toArray(): array
    {
        return [
            'nextCursor' => $this->nextCursor,
            'pageSize' => $this->pageSize,
        ];
    }
}
