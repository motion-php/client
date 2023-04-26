<?php

use Motion\ValueObjects\ApiKey;
use Motion\ValueObjects\Transporter\Headers;

beforeEach(function () {
    $this->apiKey = ApiKey::from('foo');
});

it('can be created from an API token', function () {
    $headers = Headers::withAuthorization($this->apiKey);

    expect($headers->toArray())->toBe([
        'X-API-Key' => 'foo',
    ]);
});

it('can have content/type', function () {
    $headers = Headers::withAuthorization($this->apiKey)
        ->withContentType('application/json');

    expect($headers->toArray())->toBe([
        'X-API-Key' => 'foo',
        'Content-Type' => 'application/json',
    ]);
});
