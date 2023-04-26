<?php

use Motion\Client;

it('may set an api key', function () {
    $factory = Motion::factory()
        ->withApiKey('foo')
        ->make();

    expect($factory)->toBeInstanceOf(Client::class);
});

it('may set a base uri', function () {
    expect(Motion::factory()
        ->withBaseUri('foo')
        ->make())->toBeInstanceOf(Client::class);
});

it('may set custom headers', function () {
    $client = Motion::factory()
        ->withHttpHeader('foo', 'bar')
        ->make();

    expect($client)->toBeInstanceOf(Client::class);
});
