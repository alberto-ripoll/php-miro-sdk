<?php

namespace Ripoll\PhpMiroSdk\Board\Query;

use Ripoll\PhpMiroSdk\Board\Shared\BoardResponse;

class ListAllBoards
{
    /**
     * Returns a list of boards.
     * @return Board[]
     */
    public static function run($client)
    {
        $boardsResponse = $client->get('boards');

        $boards = json_decode($boardsResponse->getBody()->getContents(), true);
        return array_map(function ($board) {
            return new BoardResponse(
                $board['id'],
                $board['type'],
                $board['name'],
                $board['description'],
            );
        }, $boards['data']);
    }
}
