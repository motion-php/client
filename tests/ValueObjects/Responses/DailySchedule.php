<?php

use Motion\ValueObjects\Responses\DailySchedule;

it('may be created from array', function () {
    $monday = DailySchedule::from(scheduleMonday());
    $tuesday = DailySchedule::from(scheduleTuesday());
    $wednesday = DailySchedule::from(scheduleWednesday());

    expect($monday->start)->toBe(scheduleMonday()['start']);
    expect($monday->end)->toBe(scheduleMonday()['end']);
});

it('may be converted to array', function () {
    $thursday = DailySchedule::from(scheduleThursday());
    $friday = DailySchedule::from(scheduleFriday());

    expect($thursday->toArray())->toBe(scheduleThursday());
    expect($friday->toArray())->toBe(scheduleFriday());
});