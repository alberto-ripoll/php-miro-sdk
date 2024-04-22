<?php

namespace Ripoll\PhpMiroSdk\StickyNote\Shared;

class StickyNoteData
{
    public function __construct(
        public string $content,
        public string $shape,
    ) {
    }

    public function toArray(): array
    {
        return [
            'content' => $this->content,
            'shape' => $this->shape,
        ];
    }
}
