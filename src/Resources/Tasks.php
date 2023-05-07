<?php

declare(strict_types=1);

namespace Motion\Resources;

use Motion\Contracts\Resources\TasksContract;
use Motion\Resources\Concerns\Transportable;
use Motion\Responses\Tasks\CreateResponse;
use Motion\Responses\Tasks\ListResponse;
use Motion\ValueObjects\Transporter\Payload;

final class Tasks implements TasksContract
{
    use Transportable;

    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('tasks', $parameters);

        $result = $this->transporter->requestObject($payload);

        return CreateResponse::from($result);
    }

    public function list(string $workspaceId): ListResponse
    {
        $payload = Payload::list('tasks', ['workspaceId' => $workspaceId]);

        $result = $this->transporter->requestObject($payload);

        return ListResponse::from($result);
    }
}
