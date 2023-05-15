<?php

declare(strict_types=1);

namespace Motion\ValueObjects;

use Motion\Contracts\StringableContract;

/**
 * @internal
 */
final class ResourceUri implements StringableContract
{
    public function __construct(private readonly string $resource)
    {
        //..
    }

    public static function create(string $resource): self
    {
        return new self($resource);
    }

    public static function list(string $resource): self
    {
        return new self($resource);
    }

    public static function update(string $resource, string $id): self
    {
        return new self("{$resource}/{$id}");
    }

    public static function retrieve(string $resource, string $id): self
    {
        return new self("{$resource}/{$id}");
    }

    public static function delete(string $resource, string $id): self
    {
        return new self("{$resource}/{$id}");
    }

    public function toString(): string
    {
        return $this->resource;
    }
}
