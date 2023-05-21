<?php

declare(strict_types=1);

namespace Motion\Responses\Comments;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\Comment;

final class CreateResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(public readonly Comment $comment)
    {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            comment: Comment::from($attributes)
        );
    }

    /**
     * @return array{id: string, taskId: string, content: string, creator: mixed[], createdAt: string}
     */
    public function toArray(): array
    {
        return $this->comment->toArray();
    }
}
