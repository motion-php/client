<?php

declare(strict_types=1);

use Motion\Client;
use Motion\Factory;

final class Motion
{
    public static function client(string $apiKey): Client
    {
        return self::factory()
            ->withApiKey($apiKey)
            ->make();
    }

    public static function factory(): Factory
    {
        return new Factory();
    }
}
