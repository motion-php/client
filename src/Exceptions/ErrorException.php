<?php

declare(strict_types=1);

namespace Motion\Exceptions;

use Exception;

final class ErrorException extends Exception
{
    /**
     * @param  array<string, string>  $contents
     */
    public function __construct(private readonly array $contents)
    {
        parent::__construct($this->contents['message']);
    }

    public function getErrorMessage(): string
    {
        return $this->getMessage();
    }

    public function getErrorType(): ?string
    {
        return $this->contents['type'];
    }

    public function getErrorCode(): ?string
    {
        return $this->contents['code'];
    }
}
