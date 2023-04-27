<?php

declare(strict_types=1);

namespace Motion\Resources\Concerns;

use Motion\Contracts\TransporterContract;

trait Transportable
{
    public function __construct(private readonly TransporterContract $transporter)
    {
        //..
    }
}
