<?php

use Motion\ValueObjects\Responses\Project;

it('may be created from array', function () {
    $project = Project::from(projectOne());

    expect($project->id)->toBe(projectOne()['id']);
    expect($project->name)->toBe(projectOne()['name']);
    expect($project->description)->toBe(projectOne()['description']);
    expect($project->workspaceId)->toBe(projectOne()['workspaceId']);
});

it('may be converted to array', function () {
    $project = Project::from(projectTwo());

    expect($project->toArray())->toBe(projectTwo());
});
