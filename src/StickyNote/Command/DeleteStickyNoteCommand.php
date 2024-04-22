<?php

namespace Ripoll\PhpMiroSdk\StickyNote\Command;

use GuzzleHttp\Client;
use Ripoll\PhpMiroSdk\StickyNote\Shared\StickyNoteDTO;

class DeleteStickyNoteCommand
{
    public static function run(Client $client, string $boardId, string $stickyNoteId): bool
    {
        try {
            $client->delete('boards/' . $boardId . '/sticky_notes/' . $stickyNoteId);

            return true;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            print_r($e->getResponse()->getBody()->getContents());
            return false;
        }
    }
}
