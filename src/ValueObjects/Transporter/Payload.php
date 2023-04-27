<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Transporter;

use Http\Discovery\Psr17Factory;
use Motion\Enums\Transporter\ContentType;
use Motion\Enums\Transporter\Method;
use Motion\ValueObjects\ResourceUri;

/**
 * @internal
 */
final class Payload
{
    /**
     * Creates a new Payload request value object.
     */
    public function __construct(
        private readonly ContentType $contentType,
        private readonly Method $method,
        private readonly ResourceUri $uri
    ) {
        //..
    }

    public static function create(string $resource): self
    {
        $contentType = ContentType::JSON;
        $method = Method::POST;
        $uri = ResourceUri::create($resource);

        return new self($contentType, $method, $uri);
    }

    public static function list(string $resource): self
    {
        $contentType = ContentType::JSON;
        $method = Method::GET;
        $uri = ResourceUri::list($resource);

        return new self($contentType, $method, $uri);
    }

    public function toRequest(BaseUri $baseUri, Headers $headers): \Psr\Http\Message\RequestInterface
    {
        $psr17Factory = new Psr17Factory();

        $uri = $baseUri->toString().$this->uri->toString();
        $headers = $headers->withContentType($this->contentType);

        $request = $psr17Factory->createRequest($this->method->value, $uri);

        foreach ($headers->toArray() as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        return $request;
    }
}
