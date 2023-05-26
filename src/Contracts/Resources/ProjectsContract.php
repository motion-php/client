<?php

declare(strict_types=1);

namespace Motion\Contracts\Resources;

interface ProjectsContract
{
    public function retrieve(string $id): \Motion\Responses\Projects\RetrieveResponse;

    public function list(string $workspaceId): \Motion\Responses\Projects\ListResponse;

    public function create(array $parameters): \Motion\Responses\Projects\CreateResponse;
}
