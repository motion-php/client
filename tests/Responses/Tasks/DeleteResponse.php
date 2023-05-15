<?php

use Motion\Responses\Tasks\DeleteResponse;

test('from', function () {
    $response = DeleteResponse::from([]);

    expect($response)->toBeInstanceOf(DeleteResponse::class);
});