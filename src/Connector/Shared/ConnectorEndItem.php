<?php

namespace Ripoll\PhpMiroSdk\Connector\Shared;

class ConnectorEndItem
{
    public function __construct(
        public $id,
        public ?ConnectorItemPosition $position = null,
        public ?string $snapTo = null,
    ) {
        if ($this->position === null && $this->snapTo === null) {
            throw new \InvalidArgumentException('Either position or snapTo must be set');
        }
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'position' => $this->position?->toArray(),
            'snapTo' => $this->snapTo,
        ];
    }
}
