<?php

use Motion\Responses\Tasks\ListResponse;
use Motion\ValueObjects\Responses\Meta;
use Motion\ValueObjects\Responses\Task;

test('list', function () {
    $client = mockMotionClient('GET', 'tasks', [], taskListResource());

    $result = $client->tasks()->list('123');

    expect($result)
        ->toBeInstanceOf(ListResponse::class)
        ->tasks->toBeArray()->toHaveCount(2)
        ->tasks->each->toBeInstanceOf(Task::class)
        ->meta->toBeInstanceOf(Meta::class);
});
