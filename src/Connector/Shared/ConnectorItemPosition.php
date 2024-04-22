<?php

namespace Ripoll\PhpMiroSdk\Connector\Shared;

class ConnectorItemPosition
{
    public function __construct(
        public string $x,
        public string $y,
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
