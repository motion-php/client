<?php

declare(strict_types=1);

namespace Motion;

use Motion\Contracts\ClientContract;
use Motion\Contracts\Resources\CommentsContract;
use Motion\Contracts\Resources\RecurringTasksContract;
use Motion\Contracts\Resources\TasksContract;
use Motion\Contracts\Resources\UsersContract;
use Motion\Contracts\Resources\WorkspacesContract;
use Motion\Contracts\TransporterContract;
use Motion\Resources\Comments;
use Motion\Resources\RecurringTasks;
use Motion\Resources\Schedules;
use Motion\Resources\Tasks;
use Motion\Resources\Users;
use Motion\Resources\Workspaces;

final class Client implements ClientContract
{
    public const VERSION = '0.1.0';

    public function __construct(private readonly TransporterContract $transporter)
    {
        //..
    }

    public function tasks(): TasksContract
    {
        return new Tasks($this->transporter);
    }

    public function users(): UsersContract
    {
        return new Users($this->transporter);
    }

    public function workspaces(): WorkspacesContract
    {
        return new Workspaces($this->transporter);
    }

    public function schedules(): Schedules
    {
        return new Schedules($this->transporter);
    }

    public function comments(): CommentsContract
    {
        return new Comments($this->transporter);
    }

    public function recurringTasks(): RecurringTasksContract
    {
        return new RecurringTasks($this->transporter);
    }
}
