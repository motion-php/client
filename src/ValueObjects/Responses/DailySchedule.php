<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class DailySchedule implements CreateFromArrayContract
{

    public function __construct(
        public readonly string $start,
        public readonly string $end
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        return new self(
            start: $attributes['start'],
            end: $attributes['end'],
        );
    }

    /**
     * @return array{start: string, end: string}
     */
    public function toArray(): array
    {
        return [
            'start' => $this->start,
            'end' => $this->end,
        ];
    }
}
