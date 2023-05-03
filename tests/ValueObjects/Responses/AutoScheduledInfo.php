<?php

use Motion\ValueObjects\Responses\AutoScheduledInfo;

it('may be created from array', function () {
    $autoScheduledInfo = AutoScheduledInfo::from(autoScheduledInfo());

    expect($autoScheduledInfo->startDate)->toBe(autoScheduledInfo()['startDate']);
});

it('may be converted to array', function () {
    $autoScheduledInfo = AutoScheduledInfo::from(autoScheduledInfo());

    expect($autoScheduledInfo->toArray())->toBe(autoScheduledInfo());
});