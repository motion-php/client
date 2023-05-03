<?php

use Motion\ValueObjects\Responses\Comment;

it('may be created from an array', function () {
    $comment = Comment::from(\comment());

    expect($comment->id)->toBe(\comment()['id']);
    expect($comment->taskId)->toBe(\comment()['taskId']);
    expect($comment->content)->toBe(\comment()['content']);
    expect($comment->creator->id)->toBe(\comment()['creator']['id']);
    expect($comment->creator->name)->toBe(\comment()['creator']['name']);
    expect($comment->creator->email)->toBe(\comment()['creator']['email']);
    expect($comment->createdAt)->toBe(\comment()['createdAt']);
});

it('may be converted to array', function () {
    $comment = Comment::from(\comment());

    expect($comment->toArray())->toBe(\comment());
});
