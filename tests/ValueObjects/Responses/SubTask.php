<?php

use Motion\ValueObjects\Responses\SubTask;

it ('may be created from array', function () {
    $subTask = SubTask::from(subTaskIncomplete());

    expect($subTask->name)->toBe(subTaskIncomplete()['name']);
    expect($subTask->completed)->toBe(subTaskIncomplete()['completed']);
});

it ('may be converted to array', function () {
    $subTask = SubTask::from(subTaskComplete());

    expect($subTask->toArray())->toBe(subTaskComplete());
});