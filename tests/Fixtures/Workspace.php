<?php

function workspaceOne()
{
    return [
        'id' => '1',
        'name' => 'Workspace One',
        'teamId' => '1',
        'statuses' => [
            statusResolved(),
            statusInProgress(),
        ],
        'labels' => [
            labelOne(),
            labelTwo(),
        ],
        'type' => 'INDIVIDUAL',
    ];
}

function workspaceTwo()
{
    return [
        'id' => '2',
        'name' => 'Workspace Two',
        'teamId' => '1',
        'statuses' => [
            statusResolved(),
            statusInProgress(),
        ],
        'labels' => [
            labelOne(),
            labelTwo(),
        ],
        'type' => 'INDIVIDUAL',
    ];
}

function listWorkspacesResource()
{
    return [
        'workspaces' => [
            workspaceOne(),
            workspaceTwo(),
        ],
        'meta' => metaOne(),
    ];
}

function listStatusesResource()
{
    return [
        'statuses' => [
            statusResolved(),
            statusInProgress(),
        ],
    ];
}
