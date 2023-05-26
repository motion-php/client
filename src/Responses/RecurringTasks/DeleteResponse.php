<?php

declare(strict_types=1);

namespace Motion\Responses\RecurringTasks;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;

final class DeleteResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(public readonly string $id)
    {
        //..
    }

    /**
     * @return array{id: string}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}
