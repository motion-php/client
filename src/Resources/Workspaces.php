<?php

declare(strict_types=1);

namespace Motion\Resources;

use Motion\Contracts\Resources\WorkspacesContract;
use Motion\Resources\Concerns\Transportable;
use Motion\Responses\Workspaces\ListResponse;
use Motion\Responses\Workspaces\ListStatusesResponse;
use Motion\ValueObjects\Transporter\Payload;

final class Workspaces implements WorkspacesContract
{
    use Transportable;

    /**
     * @param  array<string, mixed>|null  $parameters
     */
    public function list(?array $parameters = []): ListResponse
    {
        $payload = Payload::list('workspaces', $parameters);

        $result = $this->transporter->requestObject($payload);

        return ListResponse::from($result);
    }

    /**
     * @param  array<string, mixed>|null  $parameters
     */
    public function statuses(?array $parameters = []): ListStatusesResponse
    {
        $payload = Payload::list('statuses', $parameters);

        $result = $this->transporter->requestObject($payload);

        return ListStatusesResponse::from($result);
    }
}
