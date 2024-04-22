<?php

namespace Ripoll\PhpMiroSdk\StickyNote\Shared;


class StickyNoteDTO
{
    public function __construct(
        public StickyNoteData $data,
        public StickyNoteStyle $style,
        public StickyNotePosition $position,
        public StickyNoteGeometry $geometry,
        public ?int $parentId = null,
        public ?int $id = null,
    ) {
    }

    public function toArray(): array
    {
        return array_filter([
            'data' => $this->data->toArray(),
            'style' => $this->style->toArray(),
            'position' => $this->position->toArray(),
            'geometry' => $this->geometry->toArray(),
            'parentId' => $this->parentId,
        ]);
    }
}
