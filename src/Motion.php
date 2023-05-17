<?php

declare(strict_types=1);

use Motion\Client;
use Motion\Factory;

final class Motion
{
    /**
     * Creates a new Motion client with the provided API key.
     */
    public static function client(string $apiKey): Client
    {
        return self::factory()
            ->withApiKey($apiKey)
            ->make();
    }

    /**
     * Creates a new factory instance to configure a custom Motion client.
     */
    public static function factory(): Factory
    {
        return new Factory();
    }
}
