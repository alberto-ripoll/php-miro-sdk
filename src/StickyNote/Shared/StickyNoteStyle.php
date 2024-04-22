<?php

namespace Ripoll\PhpMiroSdk\StickyNote\Shared;

class StickyNoteStyle
{
    public function __construct(
        public string $fillColor,
        public string $textAlign,
        public string $textAlignVertical,

    ) {
    }

    public function toArray(): array
    {
        return [
            'fillColor' => $this->fillColor,
            'textAlign' => $this->textAlign,
            'textAlignVertical' => $this->textAlignVertical,
        ];
    }
}
