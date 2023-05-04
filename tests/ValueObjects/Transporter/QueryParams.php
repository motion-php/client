<?php

use Motion\ValueObjects\Transporter\QueryParams;

it('may be created from array', function () {
    $queryParams = QueryParams::create()
        ->withParam('name', 'John Doe')
        ->withParam('age', 30);

    expect($queryParams->toArray())->toBe([
        'name' => 'John Doe',
        'age' => 30,
    ]);
});
