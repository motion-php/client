<?php

use Motion\ValueObjects\Responses\Status;

it('may be created from array', function () {
    $status = Status::from(statusInProgress());

    expect($status->name)->toBe(statusInProgress()['name']);
    expect($status->isDefaultStatus)->toBe(statusInProgress()['isDefaultStatus']);
    expect($status->isResolvedStatus)->toBe(statusInProgress()['isResolvedStatus']);
});

it('may be converted to array', function () {
    $status = Status::from(statusResolved());

    expect($status->toArray())->toBe(statusResolved());
});
