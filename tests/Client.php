<?php

use Motion\Resources\Users;

it('has users', function () {
    $motion = Motion::client('foo');

    expect($motion->users())->toBeInstanceOf(Users::class);
});
