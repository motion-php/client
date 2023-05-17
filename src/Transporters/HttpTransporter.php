<?php

declare(strict_types=1);

namespace Motion\Transporters;

use JsonException;
use Motion\Contracts\TransporterContract;
use Motion\Enums\Transporter\ContentType;
use Motion\Exceptions\ErrorException;
use Motion\Exceptions\TransporterException;
use Motion\Exceptions\UnserializableResponse;
use Motion\ValueObjects\Transporter\BaseUri;
use Motion\ValueObjects\Transporter\Headers;
use Motion\ValueObjects\Transporter\Payload;
use Motion\ValueObjects\Transporter\QueryParams;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

final class HttpTransporter implements TransporterContract
{
    public function __construct(
        private readonly ClientInterface $client,
        private readonly BaseUri $baseUri,
        private readonly Headers $headers,
        private readonly QueryParams $queryParams
    ) {
        //..
    }

    public function requestObject(Payload $payload): array|string
    {
        $request = $payload->toRequest($this->baseUri, $this->headers, $this->queryParams);

        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $clientException) {
            throw new TransporterException($clientException);
        }

        $contents = $response->getBody()->getContents();
        $contentType = $response->getHeader('Content-Type')[0];
        if ($contentType === ContentType::TEXT->value) {
            return $contents;
        }
        if ($contentType === ContentType::TEXT_HTML->value) {
            return $contents;
        }

        try {
            $response = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $jsonException) {
            throw new UnserializableResponse($jsonException);
        }

        if (isset($response['error'])) {
            throw new ErrorException($response['error']);
        }

        return $response;
    }

    public function requestContent(Payload $payload): string
    {
        $request = $payload->toRequest($this->baseUri, $this->headers, $this->queryParams);

        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $clientException) {
            throw new TransporterException($clientException);
        }

        $contents = $response->getBody()->getContents();

        try {
            $response = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

            if (isset($response['error'])) {
                throw new ErrorException($response['error']);
            }
        } catch (JsonException) {
            //..
        }

        return $contents;
    }
}
