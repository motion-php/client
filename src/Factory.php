<?php

declare(strict_types=1);

namespace Motion;

use Http\Discovery\Psr18ClientDiscovery;
use Motion\Contracts\TransporterContract;
use Motion\Transporters\HttpTransporter;
use Motion\ValueObjects\ApiKey;
use Motion\ValueObjects\Transporter\BaseUri;
use Motion\ValueObjects\Transporter\Headers;
use Psr\Http\Client\ClientInterface;

final class Factory
{
    private ?string $apiKey = null;

    private ?TransporterContract $transporter = null;

    private ?ClientInterface $httpClient = null;

    private ?string $baseUri = null;

    /**
     * @var array<string, string>
     */
    private array $headers = [];

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
        $this->baseUri = $uri;

        return $this;
    }

    /**
     * Sets HTTP header to use for requests.
     */
    public function withHttpHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;

        return $this;
    }

    public function withTransporter(TransporterContract $transporter): self
    {
        $this->transporter = $transporter;

        return $this;
    }

    public function withHttpClient(ClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    public function make(): Client
    {
        $headers = Headers::create();
        $baseUri = BaseUri::from($this->baseUri ?: 'api.usemotion.com/v1');
        $client = $this->httpClient ??= Psr18ClientDiscovery::find();

        if ($this->apiKey !== null) {
            $headers = $headers->withAuthorization(ApiKey::from($this->apiKey));
        }

        foreach ($this->headers as $name => $value) {
            $headers = $headers->withCustomHeader($name, $value);
        }

        if (! $this->transporter instanceof TransporterContract) {
            $this->transporter = new HttpTransporter($client, $baseUri, $headers);
        }

        return new Client($this->transporter);
    }
}
