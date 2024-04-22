<?php

namespace Ripoll\PhpMiroSdk\Connector\Shared;

class Connector
{
    //   'body' => "captions":[{"content":"<p>Caption text</p>","position":"50%","textAlignVertical":"top"}],
    public function __construct(
        public ?int $id = null,
        public ConnectorStartItem $startItem,
        public ConnectorEndItem $endItem,
        public ConnectorStyle $style,
        public string $shape,
        public array $captions,
    ) {
    }

    public function toArray(): array
    {
        return [
            'startItem' => $this->startItem->toArray(),
            'endItem' => $this->endItem->toArray(),
            'style' => $this->style->toArray(),
            'shape' => $this->shape,
            'captions' => $this->captions,
        ];
    }
}
