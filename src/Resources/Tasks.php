<?php

declare(strict_types=1);

namespace Motion\Resources;

use Motion\Contracts\Resources\TasksContract;
use Motion\Resources\Concerns\Transportable;
use Motion\Responses\Tasks\ListResponse;
use Motion\ValueObjects\Transporter\Payload;

final class Tasks implements TasksContract
{
    use Transportable;

    public function create(): object
    {
        $payload = Payload::create('');

        return $this->transporter->requestObject($payload);
    }

    public function list(string $workspaceId): ListResponse
    {
        $payload = Payload::list('tasks', ['workspace' => $workspaceId]);

        $result = $this->transporter->requestObject($payload);

        return ListResponse::from($result);
    }
}
