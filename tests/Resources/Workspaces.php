<?php

use Motion\Responses\Workspaces\ListResponse;
use Motion\Responses\Workspaces\ListStatusesResponse;
use Motion\ValueObjects\Responses\Meta;
use Motion\ValueObjects\Responses\Workspace;

test('list', function () {
    $client = mockMotionClient('GET', 'workspaces', [], listWorkspacesResource());

    $result = $client->workspaces()->list();

    expect($result)
        ->toBeInstanceOf(ListResponse::class)
        ->workspaces->toBeArray()->toHaveCount(2)
        ->workspaces->each->toBeInstanceOf(Workspace::class)
        ->meta->toBeInstanceOf(Meta::class)
        ->meta->toArray()->toBe(metaOne());
});

test('list statuses', function () {
    $client = mockMotionClient('GET', 'statuses', [], listStatusesResource());

    $result = $client->workspaces()->statuses();

    expect($result)
        ->toBeInstanceOf(ListStatusesResponse::class)
        ->statuses->toBeArray()->toHaveCount(2)
        ->toArray()->toBe([
            'statuses' => [
                statusResolved(),
                statusInProgress(),
            ],
        ]);
});
