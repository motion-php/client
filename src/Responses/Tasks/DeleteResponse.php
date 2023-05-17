<?php

declare(strict_types=1);

namespace Motion\Responses\Tasks;

use Motion\Responses\Concerns\ArrayAccessible;

final class DeleteResponse implements \Motion\Contracts\ResponseContract
{
    use ArrayAccessible;

    public function __construct(public readonly string $id)
    {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            id: $attributes['id'],
        );
    }

    /**
     * {@inheritDoc}
     *
     * @return array{id: string}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}
