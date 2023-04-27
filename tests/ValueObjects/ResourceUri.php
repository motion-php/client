<?php

use Motion\ValueObjects\ResourceUri;

it('can be created from string', function () {
    $resourceUri = ResourceUri::create('tasks');

    expect($resourceUri->toString())->toBe('tasks');
});
