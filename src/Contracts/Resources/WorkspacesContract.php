<?php

declare(strict_types=1);

namespace Motion\Contracts\Resources;

use Motion\Responses\Workspaces\ListResponse;

interface WorkspacesContract
{
    public function list(?array $parameters = []): ListResponse;

    public function statuses(?array $parameters = []);
}
