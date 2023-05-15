<?php

use Motion\Responses\Tasks\UpdateResponse;
use Motion\ValueObjects\Responses\Task;

test('from', function () {
    $response = UpdateResponse::from(taskOne());

    expect($response)->toBeInstanceOf(UpdateResponse::class);

    $task = $response->task;

    expect($task)
        ->toBeInstanceOf(Task::class)
        ->duration->toBe('NONE')
        ->name->toBe('Task One');
});