<?php

declare(strict_types=1);

namespace Motion\Resources;

use Motion\Contracts\Resources\RecurringTasksContract;
use Motion\Resources\Concerns\Transportable;
use Motion\Responses\RecurringTasks\CreateResponse;
use Motion\Responses\RecurringTasks\ListResponse;
use Motion\ValueObjects\Transporter\Payload;

final class RecurringTasks implements RecurringTasksContract
{
    use Transportable;

    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('recurring-tasks', $parameters);

        $result = $this->transporter->requestObject($payload);

        return CreateResponse::from($result);
    }

    public function list(string $workspaceId, array $parameters = []): ListResponse
    {
        $parameters = array_merge($parameters, ['workspaceId' => $workspaceId]);
        $payload = Payload::list('recurring-tasks', $parameters);

        $result = $this->transporter->requestObject($payload);

        return ListResponse::from($result);
    }

    public function delete(string $taskId): void
    {
        // TODO: Implement delete() method.
    }
}
