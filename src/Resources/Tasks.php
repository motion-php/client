<?php

declare(strict_types=1);

namespace Motion\Resources;

use Motion\Contracts\Resources\TasksContract;
use Motion\Resources\Concerns\Transportable;
use Motion\Responses\Tasks\CreateResponse;
use Motion\Responses\Tasks\DeleteResponse;
use Motion\Responses\Tasks\ListResponse;
use Motion\Responses\Tasks\RetrieveResponse;
use Motion\Responses\Tasks\UpdateResponse;
use Motion\ValueObjects\Transporter\Payload;

/**
 * @internal
 */
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

    public function update(string $taskId, array $parameters): UpdateResponse
    {
        $payload = Payload::update('tasks', $taskId, $parameters);

        $result = $this->transporter->requestObject($payload);

        return UpdateResponse::from($result);
    }

    public function retrieve(string $taskId): RetrieveResponse
    {
        $payload = Payload::retrieve('tasks', $taskId);

        $result = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($result);
    }

    public function delete(string $taskId): DeleteResponse
    {
        $payload = Payload::delete('tasks', $taskId);

        $result = $this->transporter->requestObject($payload);

        return DeleteResponse::from($result);
    }
}
