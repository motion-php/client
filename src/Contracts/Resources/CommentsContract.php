<?php

declare(strict_types=1);

namespace Motion\Contracts\Resources;

interface CommentsContract
{
    public function create(string $taskId, string $content);

    public function list(string $taskId, array $parameters = []);
}
