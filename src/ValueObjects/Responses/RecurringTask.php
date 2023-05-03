<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class RecurringTask implements CreateFromArrayContract
{

    public function __construct(
        public readonly Workspace $workspace,
        public readonly string    $id,
        public readonly string    $name,
        public readonly string    $description,
        public readonly User      $creator,
        public readonly User      $assignee,
        public readonly Project   $project,
        public readonly Status    $status,
        public readonly string    $priority,
        public readonly array     $labels,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            workspace: Workspace::from($attributes['workspace']),
            id: $attributes['id'],
            name: $attributes['name'],
            description: $attributes['description'],
            creator: User::from($attributes['creator']),
            assignee: User::from($attributes['assignee']),
            project: Project::from($attributes['project']),
            status: Status::from($attributes['status']),
            priority: $attributes['priority'],
            labels: array_map(fn (array $label): \Motion\ValueObjects\Responses\Label => Label::from($label), $attributes['labels']),
        );
    }

    /**
     * @return array{workspace: mixed[], id: string, name: string, description: string, creator: mixed[], assignee: mixed[], project: mixed[], status: mixed[], priority: string, labels: mixed[][]}
     */
    public function toArray(): array
    {
        return [
            'workspace' => $this->workspace->toArray(),
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'creator' => $this->creator->toArray(),
            'assignee' => $this->assignee->toArray(),
            'project' => $this->project->toArray(),
            'status' => $this->status->toArray(),
            'priority' => $this->priority,
            'labels' => array_map(fn (Label $label): array => $label->toArray(), $this->labels),
        ];
    }
}
