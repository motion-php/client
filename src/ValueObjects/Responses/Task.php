<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class Task implements CreateFromArrayContract
{
    public function __construct(
        public readonly string $duration,
        public readonly Workspace $workspace,
        public readonly string $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $dueDate,
        public readonly string $deadlineType,
        public readonly string $parentRecurringTaskId,
        public readonly bool $completed,
        public readonly User $creator,
        public readonly Project $project,
        public readonly Status $status,
        public readonly string $priority,
        public readonly array $labels,
        public readonly array $assignees,
        public readonly string $scheduledStart,
        public readonly string $scheduledEnd,
        public readonly bool $schedulingIssue
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        $labels = array_map(fn (array $label): \Motion\ValueObjects\Responses\Label => Label::from($label), $attributes['labels']);
        $assignees = array_map(fn (array $assignee): \Motion\ValueObjects\Responses\User => User::from($assignee), $attributes['assignees']);

        return new self(
            $attributes['duration'],
            Workspace::from($attributes['workspace']),
            $attributes['id'],
            $attributes['name'],
            $attributes['description'],
            $attributes['dueDate'],
            $attributes['deadlineType'],
            $attributes['parentRecurringTaskId'],
            $attributes['completed'],
            User::from($attributes['creator']),
            Project::from($attributes['project']),
            Status::from($attributes['status']),
            $attributes['priority'],
            $labels,
            $assignees,
            $attributes['scheduledStart'],
            $attributes['scheduledEnd'],
            $attributes['schedulingIssue'],
        );
    }

    /**
     * @return array{duration: string, workspace: mixed[], id: string, name: string, description: string, dueDate: string, deadlineType: string, parentRecurringTaskId: string, completed: bool, creator: mixed[], project: mixed[], status: mixed[], priority: string, labels: mixed[][], assignees: mixed[][], scheduledStart: string, scheduledEnd: string, schedulingIssue: bool}
     */
    public function toArray(): array
    {
        return [
            'duration' => $this->duration,
            'workspace' => $this->workspace->toArray(),
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'dueDate' => $this->dueDate,
            'deadlineType' => $this->deadlineType,
            'parentRecurringTaskId' => $this->parentRecurringTaskId,
            'completed' => $this->completed,
            'creator' => $this->creator->toArray(),
            'project' => $this->project->toArray(),
            'status' => $this->status->toArray(),
            'priority' => $this->priority,
            'labels' => array_map(fn (Label $label): array => $label->toArray(), $this->labels),
            'assignees' => array_map(fn (User $assignee): array => $assignee->toArray(), $this->assignees),
            'scheduledStart' => $this->scheduledStart,
            'scheduledEnd' => $this->scheduledEnd,
            'schedulingIssue' => $this->schedulingIssue,
        ];
    }
}
