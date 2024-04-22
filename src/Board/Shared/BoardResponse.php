<?php

namespace Ripoll\PhpMiroSdk\Board\Shared;

class BoardResponse
{
    public function __construct(
        public readonly string $id,
        public readonly string $type,
        public readonly string $name,
        public readonly string $description,
    ) {
    }
}
