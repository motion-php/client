<?php

use Motion\ValueObjects\Responses\Workspace;

it('may be created from array', function () {
    $workspace = Workspace::from(workspaceOne());

    expect($workspace->id)->toBe(workspaceOne()['id']);
    expect($workspace->name)->toBe(workspaceOne()['name']);
});

it('may be converted to array', function () {
    $workspace = Workspace::from(workspaceTwo());

    expect($workspace->toArray())->toBe(workspaceTwo());
});