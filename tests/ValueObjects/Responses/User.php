<?php

use Motion\ValueObjects\Responses\User;

it('may be created from array', function () {
    $user = User::from(user1());

    expect($user->id)->toBe(user1()['id']);
    expect($user->name)->toBe(user1()['name']);
    expect($user->email)->toBe(user1()['email']);
});

it('may be converted to array', function () {
    $user = User::from(user2());

    expect($user->toArray())->toBe(user2());
});
