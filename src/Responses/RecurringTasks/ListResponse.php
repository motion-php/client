<?php

declare(strict_types=1);

namespace Motion\Responses\RecurringTasks;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\RecurringTask;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(readonly public array $tasks)
    {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            tasks: array_map(static fn (array $task): RecurringTask => RecurringTask::from($task), $attributes),
        );
    }

    public function toArray(): array
    {
        return array_map(static fn (RecurringTask $task): array => $task->toArray(), $this->tasks);
    }
}
