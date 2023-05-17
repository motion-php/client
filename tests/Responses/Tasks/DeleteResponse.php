<?php

use Motion\Responses\Tasks\DeleteResponse;

test('from', function () {
    $response = DeleteResponse::from(['id' => 'sdfwer']);

    expect($response)->toBeInstanceOf(DeleteResponse::class);
    expect($response->id)->toBe('sdfwer');
});
