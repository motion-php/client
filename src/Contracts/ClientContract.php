<?php

declare(strict_types=1);

namespace Motion\Contracts;

use Motion\Contracts\Resources\TasksContract;
use Motion\Contracts\Resources\UsersContract;

/**
 * @internal
 */
interface ClientContract
{
    public function tasks(): TasksContract;

    public function users(): UsersContract;
}
