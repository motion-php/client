<?php

use GuzzleHttp\Psr7\Response;
use Motion\Transporters\HttpTransporter;
use Motion\ValueObjects\ApiKey;
use Motion\ValueObjects\Transporter\BaseUri;
use Motion\ValueObjects\Transporter\Headers;
use Motion\ValueObjects\Transporter\Payload;
use Motion\ValueObjects\Transporter\QueryParams;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

beforeEach(function () {
    $this->client = Mockery::mock(ClientInterface::class);

    $apiKey = ApiKey::from('foo');

    $this->http = new HttpTransporter(
        $this->client,
        BaseUri::from('https://api.motion.dev'),
        Headers::withAuthorization($apiKey),
        QueryParams::create(),
        fn (RequestInterface $request): ResponseInterface => $this->client->sendAsyncRequest($request, ['stream' => true]),
    );
});

//test('request object', function () {
//    $payload = Payload::list('tasks');
//
//    $response = new Response(200, ['Content-Type' => 'application/json; charset=utf-8'], json_encode([
//        'qdwq',
//    ]));
//
//    $this->client
//        ->shouldReceive('sendRequest')
//        ->once()
//        ->withArgs(function (GuzzleHttp\Psr7\Request $request) {
//            expect($request->getMethod())->toBe('GET');
//            expect($request->getUri()->getPath())->toBe('/tasks');
//
//            return true;
//        })->andReturn($response);
//
//    $this->http->requestObject($payload);
//});

test('request object with query params', function () {
    $payload = Payload::list('users', ['workspaceId' => 'foo']);

    $response = new Response(200, ['Content-Type' => 'application/json; charset=utf-8'], json_encode([
        'qdwq',
    ]));

    $this->client
        ->shouldReceive('sendRequest')
        ->once()
        ->withArgs(function (GuzzleHttp\Psr7\Request $request) {
            expect($request->getMethod())->toBe('GET');
            expect($request->getUri()->getPath())->toBe('/users');
            expect($request->getUri()->getQuery())->toBe('workspaceId=foo');

            return true;
        })->andReturn($response);

    $this->http->requestObject($payload);
});

test('request object response', function () {
    $payload = Payload::list('tasks');

    $response = new Response(200, ['Content-Type' => 'application/json; charset=utf-8'], json_encode([
        'text' => 'foo',
    ]));

    $this->client
        ->shouldReceive('sendRequest')
        ->once()
        ->andReturn($response);

    $response = $this->http->requestObject($payload);

    expect($response)->toBe([
        'text' => 'foo',
    ]);
});
