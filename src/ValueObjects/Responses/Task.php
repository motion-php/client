<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

final class Task
{
    public function __construct(
        public readonly int|string $duration,
        public readonly Workspace $workspace,
        public readonly string $id,
        public readonly string $name,
        public readonly string $dueDate,
        public readonly string $deadlineType,
        public readonly bool $completed,
        public readonly User $creator,
        public readonly Status $status,
        public readonly string $priority,
        public readonly array $labels,
        public readonly array $assignees,
        public readonly bool $schedulingIssue,
        public readonly ?string $parentRecurringTaskId = null,
        public readonly ?string $scheduledStart = null,
        public readonly ?string $scheduledEnd = null,
        public readonly ?string $description = null,
        public readonly ?Project $project = null,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        $labels = array_map(fn (array $label): Label => Label::from($label), $attributes['labels']);

        $assignees = array_map(fn (array $attributes): User => User::from($attributes), $attributes['assignees']);

        return new self(
            $attributes['duration'],
            Workspace::from($attributes['workspace']),
            $attributes['id'],
            $attributes['name'],
            $attributes['dueDate'],
            $attributes['deadlineType'],
            $attributes['completed'],
            User::from($attributes['creator']),
            Status::from($attributes['status']),
            $attributes['priority'],
            $labels,
            $assignees,
            $attributes['schedulingIssue'],
            $attributes['parentRecurringTaskId'],
            $attributes['scheduledStart'],
            $attributes['scheduledEnd'],
            $attributes['description'],
            isset($attributes['project']) ? Project::from($attributes['project']) : null,
        );
    }

    /**
     * @return array{duration: string, workspace: array{id: string, name: string, teamId: string, statuses: mixed[][], labels: mixed[][], type: string}, id: string, name: string, description: string, dueDate: string, deadlineType: string, parentRecurringTaskId: string, completed: bool, creator: array{id: string, name: string, email: string}, project: array{id: string, name: string, description: string, workspaceId: string}, status: array{name: string, isDefaultStatus: bool, isResolvedStatus: bool}, priority: string, labels: array<mixed, array{name: string}>, assignees: array<mixed, array{id: string, name: string, email: string}>, scheduledStart: string, scheduledEnd: string, schedulingIssue: bool}
     */
    public function toArray(): array
    {
        $project = $this->project?->toArray();

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
            'project' => $project ?: null,
            'status' => $this->status->toArray(),
            'priority' => $this->priority,
            'labels' => array_map(fn (Label $label): array => $label->toArray(), $this->labels),
            'assignees' => array_map(fn (User $user): array => $user->toArray(), $this->assignees),
            'scheduledStart' => $this->scheduledStart,
            'scheduledEnd' => $this->scheduledEnd,
            'schedulingIssue' => $this->schedulingIssue,
        ];
    }
}
