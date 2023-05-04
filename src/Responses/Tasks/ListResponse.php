<?php

declare(strict_types=1);

namespace Motion\Responses\Tasks;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\Meta;
use Motion\ValueObjects\Responses\Task;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(
        public readonly Meta $meta,
        public readonly array $tasks,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        $tasks = array_map(fn (array $task): Task => Task::from($task), $attributes['tasks']);

        return new self(
            meta: Meta::from($attributes['meta']),
            tasks: $tasks,
        );
    }

    /**
     * @return array{meta: array{nextCursor: string, pageSize: int|string}, tasks: array<mixed, array{duration: string, workspace: array{id: string, name: string, teamId: string, statuses: mixed[][], labels: mixed[][], type: string}, id: string, name: string, description: string, dueDate: string, deadlineType: string, parentRecurringTaskId: string, completed: bool, creator: array{id: string, name: string, email: string}, project: array{id: string, name: string, description: string, workspaceId: string}, status: array{name: string, isDefaultStatus: bool, isResolvedStatus: bool}, priority: string, labels: array<int|string, array{name: string}>, assignees: array<int|string, array{id: string, name: string, email: string}>, scheduledStart: string, scheduledEnd: string, schedulingIssue: bool}>}
     */
    public function toArray(): array
    {
        return [
            'meta' => $this->meta->toArray(),
            'tasks' => array_map(
                static fn (Task $task): array => $task->toArray(),
                $this->tasks,
            ),
        ];
    }
}
