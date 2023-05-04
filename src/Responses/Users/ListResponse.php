<?php

declare(strict_types=1);

namespace Motion\Responses\Users;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\Meta;
use Motion\ValueObjects\Responses\User;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(
        public readonly array $users,
        public readonly ?Meta $meta = null,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        $users = array_map(fn (array $user): User => User::from($user), $attributes['users']);
        $meta = isset($attributes['meta']) ? Meta::from($attributes['meta']) : null;

        return new self(
            users: $users,
            meta: $meta,
        );
    }

    /**
     * @return array{users: array<mixed, array{id: string, name: string, email: string}>, meta: array{nextCursor: string, pageSize: int|string}|null}
     */
    public function toArray(): array
    {
        return [
            'users' => array_map(
                static fn (User $user): array => $user->toArray(),
                $this->users,
            ),
            'meta' => $this->meta?->toArray(),
        ];
    }
}
