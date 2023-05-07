<?php

use Motion\Responses\Tasks\CreateResponse;
use Motion\ValueObjects\Responses\Task;
use Motion\ValueObjects\Responses\Workspace;

test('from', function () {
    $response = CreateResponse::from(taskOne());

    expect($response)->toBeInstanceOf(CreateResponse::class);

    $task = $response->task;

    expect($task)
        ->toBeInstanceOf(Task::class)
        ->duration->toBe('NONE')
        ->workspace->toBeInstanceOf(Workspace::class)
        ->id->toBe('1')
        ->name->toBe('Task One');
});
