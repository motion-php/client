<?php

function autoScheduledInfo(): array
{
    return [
        'startDate' => '2023-04-20T06:00:00.000Z',
        'deadlineType' => 'SOFT',
        'schedule' => schedule(),
    ];
}
