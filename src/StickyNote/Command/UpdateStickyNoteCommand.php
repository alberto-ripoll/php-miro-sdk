<?php

namespace Ripoll\PhpMiroSdk\StickyNote\Command;

use GuzzleHttp\Client;
use Ripoll\PhpMiroSdk\StickyNote\Shared\StickyNoteDTO;

class UpdateStickyNoteCommand
{
    public static function run(Client $client, $boardId, StickyNoteDTO $stickyNoteDTO): bool
    {
        try {
            $client->request('PATCH', 'boards/' . $boardId . "/sticky_notes/" . $stickyNoteDTO->id, [
                'json' => $stickyNoteDTO->toArray()
            ]);

            return true;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            print_r($e->getResponse()->getBody()->getContents());
            return false;
        }
    }
}
