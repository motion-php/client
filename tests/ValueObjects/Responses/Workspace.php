<?php

function workspaceOne()
{
    return [
        'id' => 'WorkspaceOne',
        'name' => 'Workspace One',
        'teamId' => '5',
        'statuses' => [
            statusInProgress(),
            statusResolved(),
        ],
        'labels' => [
            labelOne(),
            labelTwo(),
        ],
        'type' => 'board',
    ];
}

function workspaceTwo()
{
    return [
        'id' => 'WorkspaceTwo',
        'name' => 'Workspace Two',
        'teamId' => '5',
        'statuses' => [
            statusInProgress(),
            statusResolved(),
        ],
        'labels' => [
            labelOne(),
            labelTwo(),
        ],
        'type' => 'kanban',
    ];
}