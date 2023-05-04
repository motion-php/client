<?php

use Motion\ValueObjects\Responses\User;

it('may be created from array', function () {
    $user = User::from(userOne());

    expect($user->id)->toBe(userOne()['id']);
    expect($user->name)->toBe(userOne()['name']);
    expect($user->email)->toBe(userOne()['email']);
});

it('may be converted to array', function () {
    $user = User::from(userTwo());

    expect($user->toArray())->toBe(userTwo());
});
