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
        ->and($task->assignee->id)->toBe(taskOne()['assignee']['id'])
        ->and($task->assignee->name)->toBe(taskOne()['assignee']['name'])
        ->and($task->assignee->email)->toBe(taskOne()['assignee']['email'])
        ->and($task->workspaceId)->toBe(taskOne()['workspaceId'])
        ->and($task->projectId)->toBe(taskOne()['projectId'])
        ->and($task->statusId)->toBe(taskOne()['statusId'])
        ->and($task->priorityId)->toBe(taskOne()['priorityId'])
        ->and($task->createdAt)->toBe(taskOne()['createdAt'])
        ->and($task->updatedAt)->toBe(taskOne()['updatedAt']);
});

it('may be converted to array', function () {
    $task = Task::from(taskTwo());

    expect($task->toArray())->toBe(taskTwo());
});