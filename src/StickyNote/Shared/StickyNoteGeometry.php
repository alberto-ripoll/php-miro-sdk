<?php

namespace Ripoll\PhpMiroSdk\StickyNote\Shared;

class StickyNoteGeometry
{
    public function __construct(
        public ?int $height = null,
        public ?int $width = null,
    ) {
        if ($height === null && $width === null) {
            throw new \InvalidArgumentException('At least one of height or width must be set');
        }
    }

    public function toArray(): array
    {
        return [
            'height' => $this->height,
            'width' => $this->width,
        ];
    }
}
