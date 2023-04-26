<?php

use Motion\ValueObjects\ApiKey;

it('may be created from string', function () {
    $apiKey = ApiKey::from('foo');

    expect($apiKey)->toBeInstanceOf(ApiKey::class)
        ->and($apiKey->toString())->toBe('foo');
});
