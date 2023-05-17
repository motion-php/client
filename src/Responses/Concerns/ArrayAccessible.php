<?php

declare(strict_types=1);

namespace Motion\Responses\Concerns;

use BadMethodCallException;

trait ArrayAccessible
{
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->toArray());
    }

    public function offsetGet($offset): mixed
    {
        return $this->toArray()[$offset];
    }

    public function offsetSet($offset, $value): never
    {
        throw new BadMethodCallException('Cannot set response attributes.');
    }

    public function offsetUnset($offset): never
    {
        throw new BadMethodCallException('Cannot unset response attributes.');
    }
}
