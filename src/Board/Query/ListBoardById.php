<?php

namespace Ripoll\PhpMiroSdk\Board\Query;

use Ripoll\PhpMiroSdk\Board\Response\BoardResponse;

class ListBoardById
{
    /**
     * Returns a list of boards.
     * @return Board[]
     */
    public static function run($client, $boardId)
    {
        $boardsResponse = $client->get('boards/' . $boardId);

        $boards = json_decode($boardsResponse->getBody()->getContents(), true);
        return new BoardResponse(
            $boards['id'],
            $boards['type'],
            $boards['name'],
            $boards['description'],
        );
    }
}
