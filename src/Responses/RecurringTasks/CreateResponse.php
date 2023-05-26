<?php

declare(strict_types=1);

namespace Motion\Responses\RecurringTasks;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\RecurringTask;

final class CreateResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(public readonly RecurringTask $task)
    {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            task: RecurringTask::from($attributes),
        );
    }

    /**
     * @return array{workspace: mixed[], id: string, name: string, description: string, creator: mixed[], assignee: mixed[], project: mixed[], status: mixed[], priority: string, labels: mixed[][]}
     */
    public function toArray(): array
    {
        return $this->task->toArray();
    }
}
