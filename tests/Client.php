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

it('has comments', function () {
    $motion = Motion::client('foo');

    expect($motion->comments())->toBeInstanceOf(Motion\Resources\Comments::class);
});

it('has recurring tasks', function () {
    $motion = Motion::client('foo');

    expect($motion->recurringTasks())->toBeInstanceOf(Motion\Resources\RecurringTasks::class);
});

it('has projects', function () {
    $motion = Motion::client('foo');

    expect($motion->projects())->toBeInstanceOf(Motion\Resources\Projects::class);
});
