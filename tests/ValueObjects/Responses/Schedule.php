<?php

use Motion\ValueObjects\Responses\Schedule;

it('may be created from array', function () {
    $schedule = Schedule::from(simpleSchedule());

    expect($schedule->name)->toBe(simpleSchedule()['name']);
    expect($schedule->isDefaultTimezone)->toBe(simpleSchedule()['isDefaultTimezone']);
    expect($schedule->timezone)->toBe(simpleSchedule()['timezone']);
});

it('may be converted to array', function () {
    $schedule = Schedule::from(simpleSchedule());

    expect($schedule->toArray())->toBe(simpleSchedule());
});
