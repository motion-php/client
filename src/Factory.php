<?php

declare(strict_types=1);

namespace Motion;

use Motion\ValueObjects\ApiKey;
use Motion\ValueObjects\Transporter\Headers;

final class Factory
{
    private ?string $apiKey = null;

    /**
     * Sets the API key to use for authentication.
     */
    public function withApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Sets the base URI to use for requests.
     */
    public function withBaseUri(string $uri): self
    {
        return $this;
    }

    /**
     * Sets HTTP header to use for requests.
     */
    public function withHttpHeader(string $name, string $value): self
    {
        return $this;
    }

    public function make(): Client
    {
        $headers = Headers::create();

        if ($this->apiKey !== null) {
            $headers = $headers->withAuthorization(ApiKey::from($this->apiKey));
        }

        return new Client();
    }
}
