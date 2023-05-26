<?php

use Motion\Responses\Comments\CreateResponse;
use Motion\Responses\Comments\ListResponse;

test('create', function () {
    $client = mockMotionClient('POST', '/comments', [
        'text' => 'foo',
        'taskId' => 'bar',
    ], comment());

    $response = $client->comments()->create('foo', 'bar');

    expect($response)->toBeInstanceOf(CreateResponse::class)
        ->comment->toBeInstanceOf(\Motion\ValueObjects\Responses\Comment::class);
});

test('list', function () {
    $client = mockMotionClient('GET', '/comments', ['taskId' => 'foo'], commentListResponse());

    $response = $client->comments()->list('foo');

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->comments->toBeArray()->toHaveLength(2);
});
