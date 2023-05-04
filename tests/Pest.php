<?php

use Motion\Client;
use Motion\Contracts\TransporterContract;
use Motion\ValueObjects\ApiKey;
use Motion\ValueObjects\Transporter\BaseUri;
use Motion\ValueObjects\Transporter\Headers;
use Motion\ValueObjects\Transporter\Payload;
use Motion\ValueObjects\Transporter\QueryParams;
use Psr\Http\Message\ResponseInterface;

function mockMotionClient(
    string $method,
    string $resource,
    array $params,
    array|string|ResponseInterface $response,
    $methodName = 'requestObject'
) {
    $transporter = Mockery::mock(TransporterContract::class);

    $transporter
        ->shouldReceive($methodName)
        ->once()
        ->withArgs(function (Payload $payload) use ($method, $resource) {
            $baseUri = BaseUri::from('api.usemotion.com/v1');
            $headers = Headers::withAuthorization(ApiKey::from('foo'));
            $queryParams = QueryParams::create();

            $request = $payload->toRequest($baseUri, $headers, $queryParams);

            return $request->getMethod() === $method
                && $request->getUri()->getPath() === "/v1/$resource";
        })->andReturn($response);

    return new Client($transporter);
}
