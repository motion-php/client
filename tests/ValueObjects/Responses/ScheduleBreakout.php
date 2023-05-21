<?php

use Motion\ValueObjects\Responses\ScheduleBreakout;

it('may be created from array', function () {
    $breakout = ScheduleBreakout::from(scheduleBreakoutComplex());

    expect($breakout->monday)->toBe(scheduleBreakoutSimple()['monday'])
        ->and($breakout->tuesday)->toBe(scheduleBreakoutSimple()['tuesday'])
        ->and($breakout->wednesday)->toBe(scheduleBreakoutSimple()['wednesday'])
        ->and($breakout->thursday)->toBe(scheduleBreakoutSimple()['thursday'])
        ->and($breakout->friday)->toBe(scheduleBreakoutSimple()['friday'])
        ->and($breakout->saturday)->toBe(scheduleBreakoutSimple()['saturday'])
        ->and($breakout->sunday)->toBe(scheduleBreakoutSimple()['sunday']);
});

it('may be converted to array', function () {
    $breakout = ScheduleBreakout::from(scheduleBreakoutComplex());

    expect($breakout->toArray())->toBe(scheduleBreakoutComplex());
});
