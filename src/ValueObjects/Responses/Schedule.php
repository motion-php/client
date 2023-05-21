<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class Schedule implements CreateFromArrayContract
{
    public function __construct(
        public readonly string $name,
        public readonly bool $isDefaultTimezone,
        public readonly string $timezone,
        public readonly ScheduleBreakout $scheduleBreakout,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            name: $attributes['name'],
            isDefaultTimezone: $attributes['isDefaultTimezone'],
            timezone: $attributes['timezone'],
            scheduleBreakout: ScheduleBreakout::from($attributes['schedule']),
        );
    }

    /**
     * @return array{name: string, timezone: string, schedule: mixed[]}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'isDefaultTimezone' => $this->isDefaultTimezone,
            'timezone' => $this->timezone,
            'schedule' => $this->scheduleBreakout->toArray(),
        ];
    }
}
