<?php

declare(strict_types=1);

namespace Motion\Contracts\Resources;

use Motion\Responses\RecurringTasks\CreateResponse;
use Motion\Responses\RecurringTasks\ListResponse;

interface RecurringTasksContract
{
    public function create(array $parameters): CreateResponse;

    public function list(string $workspaceId, array $parameters = []): ListResponse;

    public function delete(string $taskId);
}
