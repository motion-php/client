<?php

declare(strict_types=1);

namespace Motion\Resources;

use Motion\Contracts\Resources\TasksContract;
use Motion\Resources\Concerns\Transportable;
use Motion\ValueObjects\Transporter\Payload;

final class Tasks implements TasksContract
{
    use Transportable;

    public function create(): object
    {
        $payload = Payload::create('');

        return $this->transporter->requestObject($payload);
    }
}
