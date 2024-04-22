<?php

namespace Ripoll\PhpMiroSdk\Connector\Query;

use Ripoll\PhpMiroSdk\Connector\Shared\Connector;
use Ripoll\PhpMiroSdk\Connector\Shared\ConnectorStyle;
use Ripoll\PhpMiroSdk\Connector\Shared\ConnectorEndItem;
use Ripoll\PhpMiroSdk\Connector\Shared\ConnectorStartItem;
use Ripoll\PhpMiroSdk\Connector\Shared\ConnectorItemPosition;

class GetAllConnectors
{
    /**
     * Returns a list of connectors.
     * @return Connector[]
     */
    public static function run($client, $boardId)
    {
        $connectorsResponse = $client->get('boards/' . $boardId . '/connectors');

        $connectors = json_decode($connectorsResponse->getBody()->getContents(), true);
        return array_map(function ($connectorArr) {
            return new Connector(
                id: $connectorArr['id'],
                startItem: new ConnectorStartItem(
                    id: $connectorArr['startItem']['id'],
                    position: new ConnectorItemPosition(
                        x: $connectorArr['startItem']['position']['x'] ?? null,
                        y: $connectorArr['startItem']['position']['y'] ?? null,
                    ) ?? null,
                    snapTo: $connectorArr['startItem']['snapTo'] ?? null,
                ),
                endItem: new ConnectorEndItem(
                    id: $connectorArr['endItem']['id'],
                    position: new ConnectorItemPosition(
                        x: $connectorArr['endItem']['position']['x'] ?? null,
                        y: $connectorArr['endItem']['position']['y'] ?? null,
                    ) ?? null,
                    snapTo: $connectorArr['endItem']['snapTo'] ?? null,
                ),
                style: new ConnectorStyle(
                    color: $connectorArr['style']['color'] ?? null,
                    endStrokeCap: $connectorArr['style']['endStrokeCap'],
                    fontSize: $connectorArr['style']['fontSize'] ?? null,
                    startStrokeCap: $connectorArr['style']['startStrokeCap'],
                    strokeColor: $connectorArr['style']['strokeColor'],
                    strokeStyle: $connectorArr['style']['strokeStyle'],
                    strokeWidth: $connectorArr['style']['strokeWidth'],
                    textOrientation: $connectorArr['style']['textOrientation'] ?? null,
                ),
                shape: $connectorArr['shape'],
                captions: $connectorArr['captions'] ?? [],
            );
        }, $connectors['data']);
    }
}
