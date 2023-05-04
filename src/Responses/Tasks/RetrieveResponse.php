<?php

declare(strict_types=1);

namespace Motion\Responses\Tasks;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;

final class RetrieveResponse implements ResponseContract
{
    use ArrayAccessible;

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}
