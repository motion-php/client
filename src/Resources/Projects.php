<?php

declare(strict_types=1);

namespace Motion\Resources;

use Motion\Resources\Concerns\Transportable;
use Motion\Responses\Projects\CreateResponse;
use Motion\Responses\Projects\ListResponse;
use Motion\Responses\Projects\RetrieveResponse;
use Motion\ValueObjects\Transporter\Payload;

final class Projects implements \Motion\Contracts\Resources\ProjectsContract
{
    use Transportable;

    public function retrieve(string $id): RetrieveResponse
    {
        $payload = Payload::retrieve('projects', $id);

        $result = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($result);
    }

    public function list(string $workspaceId): ListResponse
    {
        $payload = Payload::list('projects', ['workspaceId' => $workspaceId]);

        $result = $this->transporter->requestObject($payload);

        return ListResponse::from($result);
    }

    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('projects', $parameters);

        $result = $this->transporter->requestObject($payload);

        return CreateResponse::from($result);
    }
}
