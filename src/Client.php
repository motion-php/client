<?php

declare(strict_types=1);

namespace Motion;

use Motion\Contracts\ClientContract;
use Motion\Contracts\Resources\TasksContract;
use Motion\Contracts\Resources\UsersContract;
use Motion\Contracts\TransporterContract;
use Motion\Resources\Tasks;
use Motion\Resources\Users;

final class Client implements ClientContract
{
    public function __construct(private readonly TransporterContract $transporter)
    {
        //..
    }

    public function tasks(): TasksContract
    {
        return new Tasks($this->transporter);
    }

    public function users(): UsersContract
    {
        return new Users($this->transporter);
    }
}
