<?php

declare(strict_types=1);

namespace Motion;

use Closure;
use Http\Discovery\Psr18Client;
use Http\Discovery\Psr18ClientDiscovery;
use Motion\Contracts\TransporterContract;
use Motion\Transporters\HttpTransporter;
use Motion\ValueObjects\ApiKey;
use Motion\ValueObjects\Transporter\BaseUri;
use Motion\ValueObjects\Transporter\Headers;
use Motion\ValueObjects\Transporter\QueryParams;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

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

    private array $queryParams = [];

    private ?\Closure $streamHandler = null;

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

    public function withQueryParam(string $name, string $value)
    {
        $this->queryParams[$name] = $value;

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

    public function withStreamHandler(Closure $streamHandler)
    {
        $this->streamHandler = $streamHandler;

        return $this;
    }

    public function make(): Client
    {
        $headers = Headers::create();
        $baseUri = BaseUri::from($this->baseUri ?: 'api.usemotion.com/v1');
        $queryParams = QueryParams::create();
        $client = $this->httpClient ??= Psr18ClientDiscovery::find();

        if ($this->apiKey !== null) {
            $headers = $headers->withAuthorization(ApiKey::from($this->apiKey));
        }

        foreach ($this->headers as $name => $value) {
            $headers = $headers->withCustomHeader($name, $value);
        }

        foreach ($this->queryParams as $name => $value) {
            $queryParams = $queryParams->withParam($name, $value);
        }

        $sendAsync = $this->makeStreamHandler($client);

        if (! $this->transporter instanceof TransporterContract) {
            $this->transporter = new HttpTransporter($client, $baseUri, $headers, $queryParams, $sendAsync);
        }

        return new Client($this->transporter);
    }

    private function makeStreamHandler(ClientInterface $client): Closure
    {
        if (! is_null($this->streamHandler)) {
            return $this->streamHandler;
        }

        if ($client instanceof \GuzzleHttp\Client) {
            return fn (RequestInterface $request): ResponseInterface => $client->send($request, ['stream' => true]);
        }

        if ($client instanceof Psr18Client) {
            return fn (RequestInterface $request): ResponseInterface => $client->sendRequest($request);
        }

        return function (RequestInterface $_): never {
            throw new \RuntimeException('To use stream requests you must provide an stream handler closure via the Motion factory.');
        };
    }
}
