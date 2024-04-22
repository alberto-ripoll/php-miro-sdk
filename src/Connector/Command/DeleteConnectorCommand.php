<?php

namespace Ripoll\PhpMiroSdk\Connector\Command;

class DeleteConnectorCommand
{
    public static function run($client, $boardId, string $connectorId): bool
    {
        try {
            $client->delete('boards/' . $boardId . '/connectors/' . $connectorId);

            return true;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            print_r($e->getResponse()->getBody()->getContents());
            return false;
        }
    }
}
