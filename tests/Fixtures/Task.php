<?php

function taskListResource()
{
    return [
        'tasks' => [
            taskOne(),
            taskTwo(),
        ],
        'meta' => metaOne(),
    ];
}

function taskOne()
{
    return [
        'duration' => 'NONE',
        'workspace' => workspaceOne(),
        'id' => '1',
        'name' => 'Task One',
        'description' => 'This is the first task',
        'dueDate' => '2019-08-24T14:15:22Z',
        'deadlineType' => 'SOFT',
        'parentRecurringTaskId' => '1',
        'completed' => false,
        'creator' => userOne(),
        'project' => projectOne(),
        'status' => statusInProgress(),
        'priority' => 'ASAP',
        'labels' => [
            labelOne(),
            labelTwo(),
        ],
        'assignees' => [
            userOne(),
            userTwo(),
        ],
        'scheduledStart' => '2019-08-24T14:15:22Z',
        'scheduledEnd' => '2019-08-24T14:15:22Z',
        'schedulingIssue' => false,
    ];
}

function taskTwo()
{
    return [
        'duration' => 'NONE',
        'workspace' => workspaceOne(),
        'id' => '2',
        'name' => 'Task Two',
        'description' => 'This is the second task',
        'dueDate' => '2019-08-24T14:15:22Z',
        'deadlineType' => 'SOFT',
        'parentRecurringTaskId' => '1',
        'completed' => false,
        'creator' => userOne(),
        'project' => projectOne(),
        'status' => statusInProgress(),
        'priority' => 'ASAP',
        'labels' => [
            labelOne(),
            labelTwo(),
        ],
        'assignees' => [
            userOne(),
            userTwo(),
        ],
        'scheduledStart' => '2019-08-24T14:15:22Z',
        'scheduledEnd' => '2019-08-24T14:15:22Z',
        'schedulingIssue' => false,
    ];
}
