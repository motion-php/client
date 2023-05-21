<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class ScheduleBreakout implements CreateFromArrayContract
{
    public function __construct(
        public readonly array $monday = [],
        public readonly array $tuesday = [],
        public readonly array $wednesday = [],
        public readonly array $thursday = [],
        public readonly array $friday = [],
        public readonly array $saturday = [],
        public readonly array $sunday = [],
    ) {
        //..
    }

    public static function from(array $attributes): self
    {

        return new self(
            monday: array_map(fn ($attribute): \Motion\ValueObjects\Responses\DailySchedule => DailySchedule::from($attribute), $attributes['monday']),
            tuesday: array_map(fn ($attribute): \Motion\ValueObjects\Responses\DailySchedule => DailySchedule::from($attribute), $attributes['tuesday']),
            wednesday: array_map(fn ($attribute): \Motion\ValueObjects\Responses\DailySchedule => DailySchedule::from($attribute), $attributes['wednesday']),
            thursday: array_map(fn ($attribute): \Motion\ValueObjects\Responses\DailySchedule => DailySchedule::from($attribute), $attributes['thursday']),
            friday: array_map(fn ($attribute): \Motion\ValueObjects\Responses\DailySchedule => DailySchedule::from($attribute), $attributes['friday']),
            saturday: array_map(fn ($attribute): \Motion\ValueObjects\Responses\DailySchedule => DailySchedule::from($attribute), $attributes['saturday']),
            sunday: array_map(fn ($attribute): \Motion\ValueObjects\Responses\DailySchedule => DailySchedule::from($attribute), $attributes['sunday']),
        );
    }

    /**
     * @return array{monday: mixed[], tuesday: mixed[], wednesday: mixed[], thursday: mixed[], friday: mixed[], saturday: mixed[], sunday: mixed[]}
     */
    public function toArray(): array
    {
        return [
            'monday' => array_map(fn ($attribute) => $attribute->toArray(), $this->monday),
            'tuesday' => array_map(fn ($attribute) => $attribute->toArray(), $this->tuesday),
            'wednesday' => array_map(fn ($attribute) => $attribute->toArray(), $this->wednesday),
            'thursday' => array_map(fn ($attribute) => $attribute->toArray(), $this->thursday),
            'friday' => array_map(fn ($attribute) => $attribute->toArray(), $this->friday),
            'saturday' => array_map(fn ($attribute) => $attribute->toArray(), $this->saturday),
            'sunday' => array_map(fn ($attribute) => $attribute->toArray(), $this->sunday),
        ];
    }
}
