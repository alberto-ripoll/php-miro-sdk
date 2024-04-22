<?php

namespace Ripoll\PhpMiroSdk\StickyNote\Command;

use Ripoll\PhpMiroSdk\StickyNote\Shared\StickyNoteDTO;

class CreateStickyNoteCommand
{
    public static function run($client, $boardId, StickyNoteDTO $stickyNoteDTO): bool
    {
        try {
            $client->post('boards/' . $boardId . '/sticky_notes', [
                'json' => $stickyNoteDTO->toArray()
            ]);


            return true;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            print_r($e->getResponse()->getBody()->getContents());
            return false;
        }
    }
}
