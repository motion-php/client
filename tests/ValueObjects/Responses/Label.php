<?php

use Motion\ValueObjects\Responses\Label;

it('may be created from array', function () {
    $label = Label::from(labelOne());

    expect($label->name)->toBe(labelOne()['name']);
});

it('may be converted to array', function () {
    $label = Label::from(labelTwo());

    expect($label->toArray())->toBe(labelTwo());
});
