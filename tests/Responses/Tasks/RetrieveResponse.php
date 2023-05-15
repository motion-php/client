<?php

use Motion\Responses\Tasks\RetrieveResponse;
use Motion\ValueObjects\Responses\Task;

test('from', function () {
    $response = RetrieveResponse::from(taskOne());

    $task = $response->task;

    expect($task)
        ->toBeInstanceOf(Task::class)
        ->duration->toBe('NONE')
        ->name->toBe('Task One');
});