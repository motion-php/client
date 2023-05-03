<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class Schedule implements CreateFromArrayContract
{
    public function __construct(
        public readonly string $name,
        public readonly string $timezone,
        public readonly array $schedule,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        $schedule = array_map(
            fn (array $schedule): \Motion\ValueObjects\Responses\DailySchedule => DailySchedule::from($schedule),
            $attributes['schedule'],
        );

        return new self(
            name: $attributes['name'],
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
            'timezone' => $this->timezone,
            'schedule' => $this->schedule,
        ];
    }
}
