<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Transporter;

use Http\Discovery\Psr17Factory;
use Motion\Enums\Transporter\ContentType;
use Motion\Enums\Transporter\Method;
use Motion\ValueObjects\ResourceUri;
use Psr\Http\Message\RequestInterface;

/**
 * @internal
 */
final class Payload
{
    /**
     * Creates a new Payload request value object.
     *
     * @param  array<string, mixed>  $parameters
     */
    public function __construct(
        private readonly ContentType $contentType,
        private readonly Method $method,
        private readonly ResourceUri $uri,
        private readonly array $parameters = [],
    ) {
        //..
    }

    /**
     * @param  array<string, mixed>  $parameters
     */
    public static function create(string $resource, array $parameters = []): self
    {
        $contentType = ContentType::JSON;
        $method = Method::POST;
        $uri = ResourceUri::create($resource);

        return new self($contentType, $method, $uri, $parameters);
    }

    /**
     * @param  array<string, mixed>  $parameters
     */
    public static function list(string $resource, array $parameters = []): self
    {
        $contentType = ContentType::JSON;
        $method = Method::GET;
        $uri = ResourceUri::list($resource);

        return new self($contentType, $method, $uri, $parameters);
    }

    /**
     * @param  array<string, mixed>  $parameters
     */
    public static function update(string $resource, string $id, array $parameters = []): self
    {
        $contentType = ContentType::JSON;
        $method = Method::PATCH;
        $uri = ResourceUri::update($resource, $id);

        return new self($contentType, $method, $uri, $parameters);
    }

    public static function retrieve(string $resource, string $id): self
    {
        $contentType = ContentType::JSON;
        $method = Method::GET;
        $uri = ResourceUri::retrieve($resource, $id);

        return new self($contentType, $method, $uri);
    }

    public static function delete(string $resource, string $id): self
    {
        $contentType = ContentType::JSON;
        $method = Method::DELETE;
        $uri = ResourceUri::delete($resource, $id);

        return new self($contentType, $method, $uri);
    }

    public function toRequest(BaseUri $baseUri, Headers $headers, QueryParams $queryParams): RequestInterface
    {
        $psr17Factory = new Psr17Factory();

        if ($this->method === Method::GET && $this->parameters !== []) {
            $queryParams = $queryParams->withParams($this->parameters);
        }

        $uri = $baseUri->toString().$this->uri->toString();
        if (! empty($queryParams->toArray())) {
            $uri .= '?'.http_build_query($queryParams->toArray());
        }

        $headers = $headers->withContentType($this->contentType);

        $request = $psr17Factory->createRequest($this->method->value, $uri);

        foreach ($headers->toArray() as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        return $request;
    }
}
