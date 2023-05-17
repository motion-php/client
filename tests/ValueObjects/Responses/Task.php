<?php

use Motion\ValueObjects\Responses\Task;

it('may be created from array', function () {
    $task = Task::from(taskOne());

    expect($task->id)->toBe(taskOne()['id'])
        ->and($task->name)->toBe(taskOne()['name'])
        ->and($task->description)->toBe(taskOne()['description'])
        ->and($task->creator->id)->toBe(taskOne()['creator']['id'])
        ->and($task->creator->name)->toBe(taskOne()['creator']['name'])
        ->and($task->creator->email)->toBe(taskOne()['creator']['email'])
        ->and($task->assignees[0]->id)->toBe(taskOne()['assignees'][0]['id'])
        ->and($task->assignees[0]->name)->toBe(taskOne()['assignees'][0]['name'])
        ->and($task->assignees[0]->email)->toBe(taskOne()['assignees'][0]['email'])
        ->and($task->project->id)->toBe(taskOne()['project']['id'])
        ->and($task->project->name)->toBe(taskOne()['project']['name']);
});

it('may be converted to array', function () {
    $task = Task::from(taskTwo());

    expect($task->toArray())->toBe(taskTwo());
});
