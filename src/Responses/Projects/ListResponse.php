<?php

declare(strict_types=1);

namespace Motion\Responses\Projects;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\Project;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(readonly public array $projects)
    {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            projects: array_map(static fn (array $project): Project => Project::from($project), $attributes),
        );
    }

    public function toArray(): array
    {
        return array_map(static fn (Project $project): array => $project->toArray(), $this->projects);
    }
}
