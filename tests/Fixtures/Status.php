<?php

function statusInProgress()
{
    return [
        'name' => 'In Progress',
        'isDefaultStatus' => true,
        'isResolvedStatus' => false,
    ];
}

function statusResolved()
{
    return [
        'name' => 'Completed',
        'isDefaultStatus' => false,
        'isResolvedStatus' => true,
    ];
}
