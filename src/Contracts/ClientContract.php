<?php

declare(strict_types=1);

namespace Motion\Contracts;

use Motion\Contracts\Resources\TasksContract;

/**
 * @internal
 */
interface ClientContract
{
    public function tasks(): TasksContract;
}
