<?php

declare(strict_types=1);

namespace Motion\Contracts\Resources;

use Motion\Responses\Tasks\CreateResponse;
use Motion\Responses\Tasks\DeleteResponse;
use Motion\Responses\Tasks\ListResponse;

interface TasksContract
{
    public function create(array $parameters): CreateResponse;

    public function list(string $workspaceId): ListResponse;

    public function update(string $taskId, array $parameters): UpdateResponse;

    public function delete(string $taskId): DeleteResponse;
}
