<?php

declare(strict_types=1);

namespace Motion\Contracts;

use Motion\Contracts\Resources\CommentsContract;
use Motion\Contracts\Resources\RecurringTasksContract;
use Motion\Contracts\Resources\SchedulesContract;
use Motion\Contracts\Resources\TasksContract;
use Motion\Contracts\Resources\UsersContract;
use Motion\Contracts\Resources\WorkspacesContract;

/**
 * @internal
 */
interface ClientContract
{
    public function tasks(): TasksContract;

    public function users(): UsersContract;

    public function comments(): CommentsContract;

    public function workspaces(): WorkspacesContract;

    public function schedules(): SchedulesContract;

    public function recurringTasks(): RecurringTasksContract;
}
