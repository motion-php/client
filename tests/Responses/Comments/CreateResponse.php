<?php

use Motion\Responses\Comments\CreateResponse;
use Motion\ValueObjects\Responses\Comment;

test('from', function () {
    $response = CreateResponse::from(comment());

    expect($response)->toBeInstanceOf(CreateResponse::class)
        ->comment->toBeInstanceOf(Comment::class);
});
