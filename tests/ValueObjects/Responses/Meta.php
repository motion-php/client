<?php

use Motion\ValueObjects\Responses\Meta;

it('may be created from array', function () {
    $meta = Meta::from(metaOne());

    expect($meta->nextCursor)->toBe(metaOne()['nextCursor']);
    expect($meta->pageSize)->toBe(metaOne()['pageSize']);
});

it('may be converted to array', function () {
    $meta = Meta::from(metaOne());
    expect($meta->toArray())->toBe(metaOne());
});
