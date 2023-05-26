<?php

use Motion\Responses\Comments\ListResponse;
use Motion\ValueObjects\Responses\Comment;
use Motion\ValueObjects\Responses\Meta;

test('from', function () {
    $response = ListResponse::from(commentListResponse());

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->and($response->comments)->toBeArray()->each->toBeInstanceOf(Comment::class)
        ->and($response->meta)->toBeInstanceOf(Meta::class);
});

test('to array', function () {
    $response = ListResponse::from(commentListResponse());

    $response = $response->toArray();

    expect($response)->toBeArray()
        ->and($response['comments'])->toBeArray()->each->toBeArray()
        ->and($response['meta'])->toBeArray();
});
