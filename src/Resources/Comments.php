<?php

declare(strict_types=1);

namespace Motion\Resources;

use Motion\Resources\Concerns\Transportable;
use Motion\Responses\Comments\CreateResponse;
use Motion\Responses\Comments\ListResponse;
use Motion\ValueObjects\Transporter\Payload;

final class Comments implements \Motion\Contracts\Resources\CommentsContract
{
    use Transportable;

    public function create(string $taskId, string $content): CreateResponse
    {
        $payload = Payload::create('comments', [
            'taskId' => $taskId,
            'content' => $content,
        ]);

        $response = $this->transporter->requestObject($payload);

        return CreateResponse::from($response);
    }

    public function list(string $taskId, array $parameters = []): ListResponse
    {
        $parameters['taskId'] = $taskId;
        $payload = Payload::list('comments', $parameters);

        $response = $this->transporter->requestObject($payload);

        return ListResponse::from($response);
    }
}
