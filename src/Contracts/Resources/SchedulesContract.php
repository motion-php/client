<?php

declare(strict_types=1);

namespace Motion\Contracts\Resources;

use Motion\Responses\Schedules\ListResponse;

interface SchedulesContract
{
    public function list(): ListResponse;
}
