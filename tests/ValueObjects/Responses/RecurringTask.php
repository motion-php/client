<?php

use Motion\ValueObjects\Responses\RecurringTask;

it('may be created from array', function () {
    $task = RecurringTask::from(recurringTaskOne());

    expect($task->id)->toBe(recurringTaskOne()['id']);
});

it('may be converted to array', function () {
    $task = RecurringTask::from(recurringTaskTwo());

    expect($task->toArray())->toBe(recurringTaskTwo());
});
