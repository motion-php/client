<?php

declare(strict_types=1);

namespace Motion\Responses\Projects;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\Project;

final class RetrieveResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(public readonly Project $project)
    {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            project: Project::from($attributes),
        );
    }

    /**
     * @return array{id: string, name: string, description: string, workspaceId: string}
     */
    public function toArray(): array
    {
        return $this->project->toArray();
    }
}
