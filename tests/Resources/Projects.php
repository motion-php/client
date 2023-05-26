<?php

use Motion\Responses\Projects\CreateResponse;
use Motion\Responses\Projects\ListResponse;
use Motion\Responses\Projects\RetrieveResponse;
use Motion\ValueObjects\Responses\Project;

test('create', function () {
    $client = mockMotionClient('POST', 'projects', [], projectTwo());

    $response = $client->projects()->create(projectTwo());

    expect($response)->toBeInstanceOf(CreateResponse::class)
        ->project->toBeInstanceOf(Project::class);
});

test('list', function () {
    $client = mockMotionClient('GET', 'projects', ['workspaceId' => '1'], projectsListResource());

    $response = $client->projects()->list('1');

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->projects->toBeArray()->toHaveLength(2);
});

test('retrieve', function () {
    $client = mockMotionClient('GET', 'projects/1', [], projectOne());

    $response = $client->projects()->retrieve('1');

    expect($response)->toBeInstanceOf(RetrieveResponse::class)
        ->project->toBeInstanceOf(Project::class);
});
