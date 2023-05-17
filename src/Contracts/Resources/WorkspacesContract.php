<?php

declare(strict_types=1);

namespace Motion\Contracts\Resources;

use Motion\Responses\Workspaces\ListResponse;
use Motion\Responses\Workspaces\ListStatusesResponse;

interface WorkspacesContract
{
    /**
     * @param  array<string, mixed>|null  $parameters
     */
    public function list(?array $parameters = []): ListResponse;

    /**
     * @param  array<string, mixed>|null  $parameters
     */
    public function statuses(?array $parameters = []): ListStatusesResponse;
}
