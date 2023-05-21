<?php

use Motion\Client;
use Motion\Contracts\TransporterContract;
use Psr\Http\Client\ClientInterface;

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

it('may use a custom transporter', function () {
    $transporter = Mockery::mock(TransporterContract::class);

    $client = Motion::factory()
        ->withTransporter($transporter)
        ->make();

    expect($client)->toBeInstanceOf(Client::class);
});

it('may use a custom http client', function () {
    $client = Mockery::mock(ClientInterface::class);

    $client = Motion::factory()
        ->withHttpClient($client)
        ->make();

    expect($client)->toBeInstanceOf(Client::class);
});

it('uses mock mode', function () {
    $client = Motion::factory()
        ->useMockMode(true)
        ->make();

    expect($client)->toBeInstanceOf(Client::class);
});
