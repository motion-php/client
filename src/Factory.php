<?php

declare(strict_types=1);

namespace Motion;

final class Factory
{
    /**
     * @return $this
     */
    public function withApiKey(string $apiKey): self
    {
        return $this;
    }

    /**
     * @return $this
     */
    public function withBaseUri(string $uri): self
    {
        return $this;
    }

    /**
     * @return $this
     */
    public function withHttpHeader(string $name, string $value): self
    {
        return $this;
    }

    public function make(): Client
    {
        return new Client();
    }
}
