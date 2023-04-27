<?php

declare(strict_types=1);

namespace Motion\Enums\Transporter;

/**
 * @internal
 */
enum ContentType: string
{
    case JSON = 'application/json';
    case TEXT = 'text/plain';
}
