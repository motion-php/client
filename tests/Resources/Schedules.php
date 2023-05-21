<?php

use Motion\Responses\Schedules\ListResponse;
use Motion\ValueObjects\Responses\ScheduleBreakout;

test('list', function () {
    $client = mockMotionClient('GET', 'schedules', [], schedulesListResource());

    $result = $client->schedules()->list();

    expect($result)
        ->toBeInstanceOf(ListResponse::class)
        ->schedules->each->toBeInstanceOf(ScheduleBreakout::class)
        ->name->toBe('Schedule 1')
        ->isDefaultTimezone->toBeFalse()
        ->timezone->toBe('America/New_York');
});
