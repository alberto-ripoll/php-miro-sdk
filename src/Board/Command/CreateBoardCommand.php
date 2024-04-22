<?php

namespace Ripoll\PhpMiroSdk\Board\Command;

use Ripoll\PhpMiroSdk\Board\Shared\BoardResponse;

class CreateBoardCommand
{
    /**
     * Returns a list of boards.
     * @return Board[]
     */
    public static function run($client, $boardData)
    {
        $boardsResponse = $client->post('boards', [
            'json' => [
                'type' => $boardData->type,
                'name' => $boardData->name,
                'description' => $boardData->description,
            ]
        ]);

        $boards = json_decode($boardsResponse->getBody()->getContents(), true);
        return new BoardResponse(
            $boards['id'],
            $boards['type'],
            $boards['name'],
            $boards['description'],
        );
    }
}
