<?php

declare(strict_types=1);

namespace Motion\Contracts;

interface CreateFromArrayContract
{
    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function from(array $attributes): self;
}
