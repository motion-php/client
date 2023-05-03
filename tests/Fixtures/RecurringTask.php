<?php

function recurringTaskOne()
{
    return [
        'workspace' => workspaceOne(),
        'id' => '1',
        'name' => 'Recurring Task One',
        'description' => 'This is the first recurring task',
        'creator' => user1(),
        'assignee' => user2(),
        'project' => projectOne(),
        'status' => statusInProgress(),
        'priority' => 'High',
        'labels' => [
            labelOne(),
            labelTwo(),
        ],
    ];
}

function recurringTaskTwo()
{
    return [
        'workspace' => workspaceOne(),
        'id' => '2',
        'name' => 'Recurring Task Two',
        'description' => 'This is the second recurring task',
        'creator' => user2(),
        'assignee' => user1(),
        'project' => projectOne(),
        'status' => statusResolved(),
        'priority' => 'Low',
        'labels' => [
            labelOne(),
            labelTwo(),
        ],
    ];
}