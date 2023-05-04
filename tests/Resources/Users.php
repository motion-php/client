<?php

use Motion\Responses\Users\ListResponse;
use Motion\ValueObjects\Responses\Meta;
use Motion\ValueObjects\Responses\User;

test('list', function () {
    $client = mockMotionClient('GET', 'users', [], listUsersResource());

    $result = $client->users()->list(['workspaceId' => '1']);

    expect($result)
        ->toBeInstanceOf(ListResponse::class)
        ->users->toBeArray()->toHaveCount(2)
        ->users->each->toBeInstanceOf(User::class)
        ->meta->toBeInstanceOf(Meta::class)
        ->meta->toArray()->toBe(metaOne());
});
