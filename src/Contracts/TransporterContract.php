<?php

declare(strict_types=1);

namespace Motion\Contracts;

use Motion\Exceptions\ErrorException;
use Motion\Exceptions\TransporterException;
use Motion\Exceptions\UnserializableResponse;
use Motion\ValueObjects\Transporter\Payload;

/**
 * @internal
 */
interface TransporterContract
{
    /**
     * Sends a request to the API.
     *
     * @return array<array-key, mixed>
     *
     * @throws ErrorException|UnserializableResponse|TransporterException
     */
    public function requestObject(Payload $payload): array|string;
}
