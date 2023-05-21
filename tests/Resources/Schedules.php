<?php

use Motion\Responses\Schedules\ListResponse;
use Motion\ValueObjects\Responses\Schedule;

test('list', function () {
    $client = mockMotionClient('GET', 'schedules', [], schedulesListResource());

    $result = $client->schedules()->list();

    expect($result)
        ->toBeInstanceOf(ListResponse::class)
        ->schedules->each->toBeInstanceOf(Schedule::class);
});
