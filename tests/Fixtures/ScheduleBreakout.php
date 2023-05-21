<?php

function scheduleBreakoutSimple()
{
    return [
        'monday' => scheduleMonday(),
        'tuesday' => scheduleTuesday(),
        'wednesday' => scheduleWednesday(),
        'thursday' => scheduleThursday(),
        'friday' => scheduleFriday(),
        'saturday' => scheduleSaturday(),
        'sunday' => scheduleSunday(),
    ];
}

function scheduleBreakoutComplex()
{
    return [
        'monday' => scheduleMondayMultiple(),
        'tuesday' => [scheduleTuesday()],
        'wednesday' => scheduleWednesdayMultiple(),
        'thursday' => [scheduleThursday()],
        'friday' => [scheduleFriday()],
        'saturday' => [scheduleSaturday()],
        'sunday' => [scheduleSunday()],
    ];
}
