<?php

declare(strict_types=1);

namespace Motion\Resources;

use Motion\Contracts\Resources\UsersContract;
use Motion\Resources\Concerns\Transportable;
use Motion\Responses\Users\ListResponse;
use Motion\ValueObjects\Transporter\Payload;

final class Users implements UsersContract
{
    use Transportable;

    public function list(array $parameters): ListResponse
    {
        $payload = Payload::list('users', $parameters);

        $result = $this->transporter->requestObject($payload);

        return ListResponse::from($result);
    }
}
