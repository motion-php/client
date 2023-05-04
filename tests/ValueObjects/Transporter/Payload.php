<?php

use Motion\ValueObjects\ApiKey;
use Motion\ValueObjects\Transporter\BaseUri;
use Motion\ValueObjects\Transporter\Headers;
use Motion\ValueObjects\Transporter\Payload;
use Motion\ValueObjects\Transporter\QueryParams;

beforeEach(function () {
    $this->apiKey = ApiKey::from('foo');
    $this->headers = Headers::withAuthorization($this->apiKey);
    $this->queryParams = QueryParams::create();
});

it('has a method', function () {
    $payload = Payload::create('tasks', []);
    $baseUri = BaseUri::from('https://api.motion.dev');

    expect($payload->toRequest($baseUri, $this->headers, $this->queryParams)->getMethod())->toBe('POST');
});

it('has a uri', function () {
    $payload = Payload::list('tasks');

    $baseUri = BaseUri::from('https://api.motion.dev');

    expect($payload->toRequest($baseUri, $this->headers, $this->queryParams)->getUri()->getPath())->toBe('/tasks');
});

it('has headers', function () {
    $payload = Payload::create('tasks', []);
    $baseUri = BaseUri::from('https://api.motion.dev');

    $headers = $this->headers->withCustomHeader('foo', 'bar');

    $request = $payload->toRequest($baseUri, $headers, $this->queryParams);

    expect($request->getHeaders())->toBe([
        'Host' => ['api.motion.dev'],
        'X-API-Key' => ['foo'],
        'foo' => ['bar'],
        'Content-Type' => ['application/json'],
    ]);
});
