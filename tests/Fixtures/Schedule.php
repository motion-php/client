<?php

function simpleSchedule()
{
    return [
        'name' => 'Schedule 1',
        'isDefaultTimezone' => true,
        'timezone' => 'America/New_York',
        'schedule' => [
            'monday' => scheduleMonday(),
            'tuesday' => scheduleTuesday(),
            'wednesday' => scheduleWednesday(),
            'thursday' => scheduleThursday(),
            'friday' => scheduleFriday(),
            'saturday' => scheduleSaturday(),
            'sunday' => scheduleSunday(),
        ],
    ];
}

function complexSchedule()
{
    return [
        'name' => 'Schedule 2',
        'isDefaultTimezone' => false,
        'timezone' => 'America/New_York',
        'schedule' => [
            'monday' => scheduleMondayMultiple(),
            'tuesday' => scheduleTuesday(),
            'wednesday' => scheduleWednesdayMultiple(),
            'thursday' => scheduleThursday(),
            'friday' => scheduleFriday(),
            'saturday' => scheduleSaturday(),
            'sunday' => scheduleSunday(),
        ],
    ];
}
