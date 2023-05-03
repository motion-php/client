<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class AutoScheduledInfo implements CreateFromArrayContract
{
    public function __construct(
        public readonly string $startDate,
        public readonly string $deadlineType,
        public readonly Schedule $schedule,
    ) {
        //..
    }
    public static function from(array $attributes): self
    {
        return new self(
            startDate: $attributes['startDate'],
            deadlineType: $attributes['deadlineType'],
            schedule: Schedule::from($attributes['schedule']),
        );
    }

    /**
     * @return array{startDate: string, deadlineType: string, schedule: array{name: string, timezone: string, schedule: mixed[]}}
     */
    public function toArray(): array
    {
        return [
            'startDate' => $this->startDate,
            'deadlineType' => $this->deadlineType,
            'schedule' => $this->schedule->toArray(),
        ];
    }
}
