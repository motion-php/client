<?php

declare(strict_types=1);

namespace Motion\Exceptions;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;

final class TransporterException extends Exception
{
    public function __construct(ClientExceptionInterface $exception)
    {
        parent::__construct($exception->getMessage(), $exception->getCode(), $exception);
    }
}
