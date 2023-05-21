<?php

use Motion\Responses\Tasks\MoveWorkspaceResponse;
use Motion\ValueObjects\Responses\Task;
use Motion\ValueObjects\Responses\Workspace;

test('from', function () {
    $response = MoveWorkspaceResponse::from(taskOne());

    expect($response)->toBeInstanceOf(MoveWorkspaceResponse::class);

    $task = $response->task;

    expect($task)
        ->toBeInstanceOf(Task::class)
        ->duration->toBe('NONE')
        ->workspace->toBeInstanceOf(Workspace::class)
        ->id->toBe('1')
        ->name->toBe('Task One');
});
