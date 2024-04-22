<?php

namespace Ripoll\PhpMiroSdk\StickyNote\Shared;

class StickyNotePosition
{
    public function __construct(
        public int $x,
        public int $y,
    ) {
    }

    public function toArray(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
        ];
    }
}
