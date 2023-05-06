<?php

declare(strict_types=1);

namespace Motion\Responses\Workspaces;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\Status;

final class ListStatusesResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(public readonly array $statuses)
    {
        //..
    }

    public static function from(array $attributes): self
    {
        $statuses = array_map(fn (array $status): Status => Status::from($status), $attributes['statuses']);

        return new self(
            statuses: $statuses,
        );
    }

    /**
     * @return array{statuses: array<mixed, array{name: string, isDefaultStatus: bool, isResolvedStatus: bool}>}
     */
    public function toArray(): array
    {
        return [
            'statuses' => array_map(
                static fn (Status $status): array => $status->toArray(),
                $this->statuses,
            ),
        ];
    }
}
