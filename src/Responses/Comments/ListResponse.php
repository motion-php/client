<?php

declare(strict_types=1);

namespace Motion\Responses\Comments;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\Comment;
use Motion\ValueObjects\Responses\Meta;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(public readonly array $comments, public readonly ?Meta $meta = null)
    {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            comments: array_map(fn (array $comment): \Motion\ValueObjects\Responses\Comment => Comment::from($comment), $attributes['comments']),
            meta: Meta::from($attributes['meta'] ?? null),
        );
    }

    /**
     * @return array{comments: array<mixed, array{id: string, taskId: string, content: string, creator: mixed[], createdAt: string}>, meta: array{nextCursor: string, pageSize: int|string}}
     */
    public function toArray(): array
    {
        return [
            'comments' => array_map(fn (Comment $comment): array => $comment->toArray(), $this->comments),
            'meta' => $this->meta->toArray(),
        ];
    }
}
