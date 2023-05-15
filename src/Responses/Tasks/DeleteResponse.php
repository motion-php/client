<?php

declare(strict_types=1);

namespace Motion\Responses\Tasks;

use Motion\Responses\Concerns\ArrayAccessible;

final class DeleteResponse implements \Motion\Contracts\ResponseContract
{
    use ArrayAccessible;

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {

    }
}
