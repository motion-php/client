<?php

declare(strict_types=1);

namespace Motion\Responses\Schedules;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\Schedule;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(public readonly array $schedules)
    {
        //..
    }

    public static function from(array $attributes): self
    {
        $schedules = array_map(fn (array $schedule): Schedule => Schedule::from($schedule), $attributes);

        return new self(
            $schedules,
        );
    }

    public function toArray(): array
    {
        $schedules = [];

        foreach ($this->schedules as $schedule) {
            $schedules[] = $schedule->toArray();
        }

        return $schedules;
    }
}
