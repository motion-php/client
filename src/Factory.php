<?php

declare(strict_types=1);

namespace Motion;

final class Factory
{
    private ?string $apiKey = null;

    public function withApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    public function make(): Client
    {
        return new Client();
    }
}
