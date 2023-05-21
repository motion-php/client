<?php

declare(strict_types=1);

namespace Motion\Contracts\Resources;

use Motion\Responses\Tasks\CreateResponse;
use Motion\Responses\Tasks\DeleteResponse;
use Motion\Responses\Tasks\ListResponse;
use Motion\Responses\Tasks\MoveWorkspaceResponse;
use Motion\Responses\Tasks\RetrieveResponse;
use Motion\Responses\Tasks\UpdateResponse;

interface TasksContract
{
    /**
     * @param  array<string, mixed>  $parameters
     */
    public function create(array $parameters): CreateResponse;

    public function list(string $workspaceId): ListResponse;

    /**
     * @param  array<string, mixed>  $parameters
     */
    public function update(string $taskId, array $parameters): UpdateResponse;

    public function delete(string $taskId): DeleteResponse;

    public function retrieve(string $taskId): RetrieveResponse;

    public function moveWorkspace(string $taskId, array $parameters): MoveWorkspaceResponse;
}
