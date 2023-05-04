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
        public readonly array $schedule,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        // @todo: map schedules with multiple DailySchedules per day
        $schedule = array_map(
            fn (array $schedule): DailySchedule => DailySchedule::from($schedule),
            $attributes['schedule'],
        );

        return new self(
            name: $attributes['name'],
            isDefaultTimezone: $attributes['isDefaultTimezone'],
            timezone: $attributes['timezone'],
            schedule: $schedule,
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
            'schedule' => array_map(fn (DailySchedule $schedule): array => $schedule->toArray(), $this->schedule),
        ];
    }
}
