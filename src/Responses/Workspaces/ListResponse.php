<?php

declare(strict_types=1);

namespace Motion\Responses\Workspaces;

use Motion\Contracts\ResponseContract;
use Motion\Responses\Concerns\ArrayAccessible;
use Motion\ValueObjects\Responses\Meta;
use Motion\ValueObjects\Responses\Workspace;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(
        public readonly array $workspaces,
        public readonly ?Meta $meta = null,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        $workspaces = array_map(fn (array $workspace): Workspace => Workspace::from($workspace), $attributes['workspaces']);
        $meta = isset($attributes['meta']) ? Meta::from($attributes['meta']) : null;

        return new self(
            workspaces: $workspaces,
            meta: $meta,
        );
    }

    /**
     * @return array{workspaces: array<mixed, array{id: string, name: string, teamId: string, statuses: mixed[][], labels: mixed[][], type: string}>, meta: array{nextCursor: string, pageSize: int|string}|null}
     */
    public function toArray(): array
    {
        return [
            'workspaces' => array_map(
                static fn (Workspace $workspace): array => $workspace->toArray(),
                $this->workspaces,
            ),
            'meta' => $this->meta?->toArray(),
        ];
    }
}
