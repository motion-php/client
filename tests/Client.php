<?php

use Motion\Resources\Users;
use Motion\Resources\Workspaces;

it('has users', function () {
    $motion = Motion::client('foo');

    expect($motion->users())->toBeInstanceOf(Users::class);
});

it('has workspaces', function () {
    $motion = Motion::client('foo');

    expect($motion->workspaces())->toBeInstanceOf(Workspaces::class);
});
