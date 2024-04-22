<?php

namespace Ripoll\PhpMiroSdk\Connector\Command;

use Ripoll\PhpMiroSdk\Connector\Shared\Connector;

class CreateConnectorCommand
{
    public static function run($client, $boardId, Connector $connector): bool
    {
        try {
            $client->post('boards/' . $boardId . '/connectors', [
                'json' => $connector->toArray()
            ]);


            return true;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            print_r($e->getResponse()->getBody()->getContents());
            return false;
        }
    }
}
