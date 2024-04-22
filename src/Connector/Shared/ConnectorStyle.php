<?php

namespace Ripoll\PhpMiroSdk\Connector\Shared;

class ConnectorStyle
{
    public function __construct(
        public string $endStrokeCap,
        public string $startStrokeCap,
        public string $strokeColor,
        public string $strokeStyle,
        public string $strokeWidth,
        public ?string $fontSize = null,
        public ?string $color = null,
        public ?string $textOrientation = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'color' => $this->color,
            'endStrokeCap' => $this->endStrokeCap,
            'fontSize' => $this->fontSize,
            'startStrokeCap' => $this->startStrokeCap,
            'strokeColor' => $this->strokeColor,
            'strokeStyle' => $this->strokeStyle,
            'strokeWidth' => $this->strokeWidth,
            'textOrientation' => $this->textOrientation,
        ];
    }
}
