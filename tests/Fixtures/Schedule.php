<?php

function schedule()
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
