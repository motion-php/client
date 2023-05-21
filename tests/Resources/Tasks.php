<?php

use Motion\Responses\Tasks\CreateResponse;
use Motion\Responses\Tasks\ListResponse;
use Motion\ValueObjects\Responses\Meta;
use Motion\ValueObjects\Responses\Project;
use Motion\ValueObjects\Responses\Task;
use Motion\ValueObjects\Responses\User;
use Motion\ValueObjects\Responses\Workspace;

test('list', function () {
    $client = mockMotionClient('GET', 'tasks', [], taskListResource());

    $result = $client->tasks()->list('123');

    expect($result)
        ->toBeInstanceOf(ListResponse::class)
        ->tasks->toBeArray()->toHaveCount(2)
        ->tasks->each->toBeInstanceOf(Task::class)
        ->meta->toBeInstanceOf(Meta::class);
});

test('create', function () {
    $data = taskTwo();

    $client = mockMotionClient('POST', 'tasks', $data, $data);

    $result = $client->tasks()->create($data);

    expect($result)
        ->toBeInstanceOf(CreateResponse::class);

    $task = $result->task;

    expect($task)
        ->toBeInstanceOf(Task::class)
        ->duration->toBe('NONE')
        ->workspace->toBeInstanceOf(Workspace::class)
        ->id->toBe('2')
        ->name->toBe('Task Two')
        ->description->toBe('This is the second task')
        ->dueDate->toBe('2019-08-24T14:15:22Z')
        ->deadlineType->toBe('SOFT')
        ->parentRecurringTaskId->toBe('1')
        ->completed->toBeFalse()
        ->creator->toBeInstanceOf(User::class)
        ->project->toBeInstanceOf(Project::class)
        ->status->toBeInstanceOf(\Motion\ValueObjects\Responses\Status::class)
        ->priority->toBe('ASAP')
        ->labels->toBeArray()->toHaveCount(2);
});

test('move workspace', function () {
    $response = taskTwo();

    $client = mockMotionClient('POST', 'tasks/2/move-workspace', [], $response);

    $result = $client->tasks()->moveWorkspace('2', []);

    expect($result)
        ->toBeInstanceOf(\Motion\Responses\Tasks\MoveWorkspaceResponse::class);

    $task = $result->task;

    expect($task)
        ->toBeInstanceOf(Task::class)
        ->duration->toBe('NONE')
        ->workspace->toBeInstanceOf(Workspace::class)
        ->id->toBe('2')
        ->name->toBe('Task Two')
        ->description->toBe('This is the second task')
        ->dueDate->toBe('2019-08-24T14:15:22Z')
        ->deadlineType->toBe('SOFT')
        ->parentRecurringTaskId->toBe('1')
        ->completed->toBeFalse()
        ->creator->toBeInstanceOf(User::class)
        ->project->toBeInstanceOf(Project::class)
        ->status->toBeInstanceOf(\Motion\ValueObjects\Responses\Status::class)
        ->priority->toBe('ASAP')
        ->labels->toBeArray()->toHaveCount(2);
});
