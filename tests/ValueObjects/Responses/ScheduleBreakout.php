<?php

use Motion\ValueObjects\Responses\DailySchedule;
use Motion\ValueObjects\Responses\ScheduleBreakout;

it('may be created from array', function () {
    $breakout = ScheduleBreakout::from(scheduleBreakoutComplex());

    expect($breakout)->toBeInstanceOf(ScheduleBreakout::class)
        ->and($breakout->monday)->toBeArray()->each->toBeInstanceOf(DailySchedule::class);
});

it('may be converted to array', function () {
    $breakout = ScheduleBreakout::from(scheduleBreakoutComplex());

    expect($breakout->toArray())->toBe(scheduleBreakoutComplex());
});
