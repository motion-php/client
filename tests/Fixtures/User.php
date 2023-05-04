<?php

function userOne()
{
    return [
        'id' => '1',
        'name' => 'John Doe',
        'email' => 'hello@test.co.uk',
    ];
}

function userTwo()
{
    return [
        'id' => '2',
        'name' => 'Jane Doe',
        'email' => 'hello@testing.co.uk',
    ];
}

function listUsersResource()
{
    return [
        'users' => [
            userOne(),
            userTwo(),
        ],
        'meta' => metaOne(),
    ];
}
