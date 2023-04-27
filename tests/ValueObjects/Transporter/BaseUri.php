<?php

use Motion\ValueObjects\Transporter\BaseUri;

it('may be created from string', function () {
    $uri = BaseUri::from('https://example.com');

    expect($uri)->toBeInstanceOf(BaseUri::class)
        ->and($uri->toString())->toBe('https://example.com/');
});

it('appends protocol if missing', function () {
    $uri = BaseUri::from('example.com');

    expect($uri->toString())->toBe('https://example.com/');
});
