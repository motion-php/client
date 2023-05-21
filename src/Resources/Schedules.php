<?php

declare(strict_types=1);

namespace Motion\Resources;

use Motion\Contracts\Resources\SchedulesContract;
use Motion\Resources\Concerns\Transportable;
use Motion\Responses\Schedules\ListResponse;
use Motion\ValueObjects\Transporter\Payload;

final class Schedules implements SchedulesContract
{
    use Transportable;

    public function list(): ListResponse
    {
        $payload = Payload::list('schedules');

        $result = $this->transporter->requestObject($payload);

        return ListResponse::from($result);
    }
}
