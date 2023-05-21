<?php

declare(strict_types=1);

namespace Motion;

use Http\Discovery\Psr18ClientDiscovery;
use Motion\Contracts\TransporterContract;
use Motion\Transporters\HttpTransporter;
use Motion\ValueObjects\ApiKey;
use Motion\ValueObjects\Transporter\BaseUri;
use Motion\ValueObjects\Transporter\Headers;
use Motion\ValueObjects\Transporter\QueryParams;
use Psr\Http\Client\ClientInterface;

final class Factory
{
    /**
     * The API key to use for authentication.
     */
    private ?string $apiKey = null;

    /**
     * The transporter to use for requests.
     */
    private ?TransporterContract $transporter = null;

    /**
     * The HTTP client to use for requests.
     */
    private ?ClientInterface $httpClient = null;

    /**
     * The base URI to use for requests.
     */
    private ?string $baseUri = null;

    /**
     * The HTTP headers to use for requests.
     *
     * @var array<string, string>
     */
    private array $headers = [];

    /**
     * The query parameters to use for requests.
     *
     * @var array<string, string|int>
     */
    private array $queryParams = [];

    private bool $mockMode = false;

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

    /**
     * Sets query parameter to use for requests.
     */
    public function withQueryParam(string $name, string $value): self
    {
        $this->queryParams[$name] = $value;

        return $this;
    }

    /**
     * Sets the transporter to use for requests.
     */
    public function withTransporter(TransporterContract $transporter): self
    {
        $this->transporter = $transporter;

        return $this;
    }

    /**
     * Sets the HTTP client to use for requests.
     */
    public function withHttpClient(ClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    public function useMockMode(bool $flag, bool $dynamic = true): self
    {
        $this->mockMode = $flag;

        return $this;
    }

    public function make(): Client
    {
        if ($this->mockMode) {
            $this->baseUri = 'https://stoplight.io/mocks/motion/motion-rest-api/33447';
            $this->withHttpHeader('Prefer', 'dynamic=true');
        }

        $headers = Headers::create();
        $baseUri = BaseUri::from($this->baseUri ?: 'api.usemotion.com/v1');
        $queryParams = QueryParams::create();
        $client = $this->httpClient ??= Psr18ClientDiscovery::find();

        $this->headers = [...$this->headers, 'User-Agent' => 'Motion PHP API Client v'.Client::VERSION];

        if ($this->apiKey !== null) {
            $headers = $headers->withAuthorization(ApiKey::from($this->apiKey));
        }

        foreach ($this->headers as $name => $value) {
            $headers = $headers->withCustomHeader($name, $value);
        }

        foreach ($this->queryParams as $name => $value) {
            $queryParams = $queryParams->withParam($name, $value);
        }

        if (! $this->transporter instanceof TransporterContract) {
            $this->transporter = new HttpTransporter($client, $baseUri, $headers, $queryParams);
        }

        return new Client($this->transporter);
    }
}
