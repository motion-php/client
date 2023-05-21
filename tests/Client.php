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

it('has schedules', function () {
    $motion = Motion::client('foo');

    expect($motion->schedules())->toBeInstanceOf(Motion\Resources\Schedules::class);
});
