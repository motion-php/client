<?php

function simpleSchedule()
{
    return [
        'name' => 'Schedule 1',
        'isDefaultTimezone' => true,
        'timezone' => 'America/New_York',
        'schedule' => scheduleBreakoutSimple(),
    ];
}

function complexSchedule()
{
    return [
        'name' => 'Schedule 2',
        'isDefaultTimezone' => false,
        'timezone' => 'America/New_York',
        'schedule' => scheduleBreakoutComplex(),
    ];
}

function schedulesListResource()
{
    return [
        simpleSchedule(),
        complexSchedule(),
    ];
}
