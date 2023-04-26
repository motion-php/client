<?php

declare(strict_types=1);

use Motion\Client;
use Motion\Factory;

final class Motion
{
    public static function client(): Client
    {
        return new Client();
    }

    public static function factory(): Factory
    {
        return new Factory();
    }
}
