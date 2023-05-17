<?php

declare(strict_types=1);

namespace Motion\Contracts\Resources;

use Motion\Responses\Users\ListResponse;

interface UsersContract
{
    /**
     * @param  array<string, mixed>  $parameters
     */
    public function list(array $parameters): ListResponse;
}
