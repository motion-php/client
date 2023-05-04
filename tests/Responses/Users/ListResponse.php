<?php

use Motion\Responses\Users\ListResponse;
use Motion\ValueObjects\Responses\Meta;
use Motion\ValueObjects\Responses\User;

test('from with meta', function () {
    $response = ListResponse::from(listUsersResource());

    expect($response)
        ->toBeInstanceOf(ListResponse::class)
        ->meta->toBeInstanceOf(Meta::class)
        ->and($response->users)
        ->toBeArray()->toHaveCount(2)
        ->each->toBeInstanceOf(User::class);
});

test('from without meta', function () {
    $response = ListResponse::from([
        'users' => [
            userOne(),
            userTwo(),
        ],
    ]);

    expect($response)
        ->toBeInstanceOf(ListResponse::class)
        ->meta->toBeNull()
        ->and($response->users)
        ->toBeArray()->toHaveCount(2)
        ->each->toBeInstanceOf(User::class);
});
