<?php


namespace Ripoll\PhpMiroSdk\Connector\Command;

use Ripoll\PhpMiroSdk\Connector\Shared\Connector;
use Ripoll\PhpMiroSdk\Connector\Shared\ConnectorStyle;
use Ripoll\PhpMiroSdk\Connector\Shared\ConnectorEndItem;
use Ripoll\PhpMiroSdk\Connector\Shared\ConnectorStartItem;
use Ripoll\PhpMiroSdk\Connector\Shared\ConnectorItemPosition;

class GetConnectorByIdQuery
{
    public static function run($client, $boardId, $connectorId)
    {
        $response = $client->get("boards/{$boardId}/connector/{$connectorId}");

        $connectorArr = json_decode($response->getBody()->getContents(), true);

        return new Connector(
            id: $connectorArr['id'],
            startItem: new ConnectorStartItem(
                id: $connectorArr['startItem']['id'],
                position: new ConnectorItemPosition(
                    x: $connectorArr['startItem']['position']['x'],
                    y: $connectorArr['startItem']['position']['y'],
                ),
                snapTo: $connectorArr['startItem']['snapTo'],
            ),
            endItem: new ConnectorEndItem(
                id: $connectorArr['endItem']['id'],
                position: new ConnectorItemPosition(
                    x: $connectorArr['endItem']['position']['x'],
                    y: $connectorArr['endItem']['position']['y'],
                ),
                snapTo: $connectorArr['endItem']['snapTo'],
            ),
            style: new ConnectorStyle(
                color: $connectorArr['style']['color'],
                endStrokeCap: $connectorArr['style']['endStrokeCap'],
                fontSize: $connectorArr['style']['fontSize'],
                startStrokeCap: $connectorArr['style']['startStrokeCap'],
                strokeColor: $connectorArr['style']['strokeColor'],
                strokeStyle: $connectorArr['style']['strokeStyle'],
                strokeWidth: $connectorArr['style']['strokeWidth'],
                textOrientation: $connectorArr['style']['textOrientation'],
            ),
            shape: $connectorArr['shape'],
            captions: $connectorArr['captions'],
        );
    }
}
