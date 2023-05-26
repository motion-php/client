<?php

use Motion\Responses\RecurringTasks\CreateResponse;
use Motion\Responses\RecurringTasks\ListResponse;
use Motion\ValueObjects\Responses\RecurringTask;

test('create', function () {
    $client = mockMotionClient('POST', 'recurring-tasks', [], recurringTaskTwo());

    $result = $client->recurringTasks()->create([]);

    expect($result)
        ->toBeInstanceOf(CreateResponse::class)
        ->task->toBeInstanceOf(RecurringTask::class);
});

test('list', function () {
    $client = mockMotionClient('GET', 'recurring-tasks', [], recurringTasksListResource());

    $result = $client->recurringTasks()->list('123');

    expect($result)
        ->toBeInstanceOf(ListResponse::class)
        ->tasks->toBeArray()->toHaveLength(4)
        ->each->toBeInstanceOf(RecurringTask::class);
});

test('delete', function () {
    $client = mockMotionClient('DELETE', 'recurring-tasks/123', [], []);

    $result = $client->recurringTasks()->delete('123');

    expect($result)->toBeInstanceOf(\Motion\Responses\RecurringTasks\DeleteResponse::class)
        ->id->toBe('123');
});
