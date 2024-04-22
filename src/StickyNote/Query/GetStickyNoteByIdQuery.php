<?php

namespace Ripoll\PhpMiroSdk\StickyNote\Query;

use Ripoll\PhpMiroSdk\StickyNote\Shared\StickyNoteDTO;
use Ripoll\PhpMiroSdk\StickyNote\Shared\StickyNoteData;
use Ripoll\PhpMiroSdk\StickyNote\Shared\StickyNoteStyle;
use Ripoll\PhpMiroSdk\StickyNote\Shared\StickyNoteGeometry;
use Ripoll\PhpMiroSdk\StickyNote\Shared\StickyNotePosition;

class GetStickyNoteByIdQuery
{
    public static function run($client, $boardId, $stickyNoteId)
    {
        $response = $client->get("boards/{$boardId}/sticky_notes/{$stickyNoteId}");

        $stickyArr = json_decode($response->getBody()->getContents(), true);

        return       new StickyNoteDTO(
            id: $stickyArr['id'],
            data: new StickyNoteData(
                content: $stickyArr['data']['content'],
                shape: $stickyArr['data']['shape']
            ),
            style: new StickyNoteStyle(
                fillColor: $stickyArr['style']['fillColor'],
                textAlign: $stickyArr['style']['textAlign'],
                textAlignVertical: $stickyArr['style']['textAlignVertical']
            ),
            position: new StickyNotePosition(
                x: $stickyArr['position']['x'],
                y: $stickyArr['position']['y']
            ),
            geometry: new StickyNoteGeometry(
                height: $stickyArr['geometry']['height'],
            ),
            parentId: $stickyArr['parentId'] ?? null
        );
    }
}
