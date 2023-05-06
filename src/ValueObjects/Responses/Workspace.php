<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class Workspace implements CreateFromArrayContract
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $type,
        public readonly ?array $statuses = null,
        public readonly ?array $labels = null,
        public readonly ?string $teamId = null,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        if (! empty($attributes['statuses'])) {
            $statuses = array_map(fn (array $status): Status => Status::from($status), $attributes['statuses']);
        }

        if (! empty($attributes['labels'])) {
            $labels = array_map(fn (array $label): Label => Label::from($label), $attributes['labels']);
        }

        return new self(
            id: $attributes['id'],
            name: $attributes['name'],
            type: $attributes['type'],
            statuses: $statuses ?? null,
            labels: $labels ?? null,
            teamId: $attributes['teamId'] ?? null,
        );
    }

    /**
     * @return array{id: string, name: string, teamId: string, statuses: mixed[][], labels: mixed[][], type: string}
     */
    public function toArray(): array
    {
        // if statuses is not null, map the statuses to an array of arrays
        if (! empty($this->statuses)) {
            $statuses = array_map(fn (Status $status): array => $status->toArray(), $this->statuses);
        }

        // if labels is not null, map the labels to an array of arrays
        if (! empty($this->labels)) {
            $labels = array_map(fn (Label $label): array => $label->toArray(), $this->labels);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'teamId' => $this->teamId,
            'statuses' => $statuses ?? null,
            'labels' => $labels ?? null,
            'type' => $this->type,
        ];
    }
}
