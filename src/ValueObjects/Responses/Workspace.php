<?php

declare(strict_types=1);

namespace Motion\ValueObjects\Responses;

use Motion\Contracts\CreateFromArrayContract;

final class Workspace implements CreateFromArrayContract
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $teamId,
        public readonly array $statuses,
        public readonly array $labels,
        public readonly string $type,
    ) {
        //..
    }

    public static function from(array $attributes): self
    {
        $statuses = array_map(fn (array $status): \Motion\ValueObjects\Responses\Status => Status::from($status), $attributes['statuses']);
        $labels = array_map(fn (array $label): \Motion\ValueObjects\Responses\Label => Label::from($label), $attributes['labels']);

        return new self(
            id: $attributes['id'],
            name: $attributes['name'],
            teamId: $attributes['teamId'],
            statuses: $statuses,
            labels: $labels,
            type: $attributes['type'],
        );
    }

    /**
     * @return array{id: string, name: string, teamId: string, statuses: mixed[][], labels: mixed[][], type: string}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'teamId' => $this->teamId,
            'statuses' => array_map(fn (Status $status): array => $status->toArray(), $this->statuses),
            'labels' => array_map(fn (Label $label): array => $label->toArray(), $this->labels),
            'type' => $this->type,
        ];
    }
}
