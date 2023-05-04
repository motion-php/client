<?php

declare(strict_types=1);

namespace Motion\Resources;

use Motion\Contracts\Resources\WorkspacesContract;
use Motion\Resources\Concerns\Transportable;
use Motion\Responses\Workspaces\ListResponse;
use Motion\ValueObjects\Transporter\Payload;

final class Workspaces implements WorkspacesContract
{
    use Transportable;

    public function list(?array $parameters = []): ListResponse
    {
        $payload = Payload::list('workspaces', $parameters);

        $result = $this->transporter->requestObject($payload);

        return ListResponse::from($result);
    }
}
