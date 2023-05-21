<?php

declare(strict_types=1);

namespace Motion\Responses\Tasks;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\Task;

final class MoveWorkspaceResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(public readonly Task $task)
    {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            task: Task::from($attributes),
        );
    }

    /**
     * @return array{duration: string, workspace: array{id: string, name: string, teamId: string, statuses: mixed[][], labels: mixed[][], type: string}, id: string, name: string, description: string, dueDate: string, deadlineType: string, parentRecurringTaskId: string, completed: bool, creator: array{id: string, name: string, email: string}, project: array{id: string, name: string, description: string, workspaceId: string}, status: array{name: string, isDefaultStatus: bool, isResolvedStatus: bool}, priority: string, labels: array<int|string, array{name: string}>, assignees: array<int|string, array{id: string, name: string, email: string}>, scheduledStart: string, scheduledEnd: string, schedulingIssue: bool}
     */
    public function toArray(): array
    {
        return $this->task->toArray();
    }
}
