<?php

use Motion\Responses\Workspaces\ListResponse;
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
