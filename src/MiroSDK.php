<?php

namespace Ripoll\PhpMiroSdk;

use GuzzleHttp\Client;
use Ripoll\PhpMiroSdk\Board\Query\ListAllBoards;
use Ripoll\PhpMiroSdk\Board\Query\ListBoardById;
use Ripoll\PhpMiroSdk\Connector\Shared\Connector;
use Ripoll\PhpMiroSdk\StickyNote\Shared\StickyNoteDTO;
use Ripoll\PhpMiroSdk\Connector\Query\GetAllConnectors;
use Ripoll\PhpMiroSdk\Connector\Command\GetConnectorByIdQuery;
use Ripoll\PhpMiroSdk\StickyNote\Query\GetStickyNoteByIdQuery;
use Ripoll\PhpMiroSdk\Connector\Command\CreateConnectorCommand;
use Ripoll\PhpMiroSdk\Connector\Command\DeleteConnectorCommand;
use Ripoll\PhpMiroSdk\Connector\Command\UpdateConnectorCommand;
use Ripoll\PhpMiroSdk\StickyNote\Command\CreateStickyNoteCommand;
use Ripoll\PhpMiroSdk\StickyNote\Command\DeleteStickyNoteCommand;
use Ripoll\PhpMiroSdk\StickyNote\Command\UpdateStickyNoteCommand;

class MiroSDK
{
    private $baseURL = 'https://api.miro.com/v2/';
    private Client $client;

    /**
     * MiroSDK constructor.
     * @param string $apiKey Your API key.
     */
    public function __construct(string $apiKey)
    {
        $this->client = new Client([
            'base_uri' => $this->baseURL,
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Bearer ' . $apiKey,
            ],
        ]);
    }

    /**
     * Adds a sticky note to a board.
     * @param string $boardId The board ID.
     * @param array $options The sticky note options.
     * @return bool
     */
    public function createStickyNote(string $boardId, StickyNoteDTO $stickyNoteDTO)
    {
        CreateStickyNoteCommand::run($this->client, $boardId, $stickyNoteDTO);
        return true;
    }

    /**
     * Adds a sticky note to a board.
     * @param string $boardId The board ID.
     * @param array $options The sticky note options.
     * @return bool
     */
    public function updateStickyNote(string $boardId, StickyNoteDTO $stickyNoteDTO)
    {
        UpdateStickyNoteCommand::run($this->client, $boardId, $stickyNoteDTO);
        return true;
    }

    /**
     * Adds a sticky note to a board.
     * @param string $boardId The board ID.
     * @param array $options The sticky note options.
     * @return bool
     */
    public function deleteStickyNote(string $boardId, string $stickyNoteId)
    {
        DeleteStickyNoteCommand::run($this->client, $boardId, $stickyNoteId);
        return true;
    }

    /**
     * Returns a sticky note from the board given an ID.
     * @param string $boardId The board ID.
     * @param string $stickyNoteId The sticky note id.
     * @return StickyNoteDTO
     */
    public function getStickyNoteById(string $boardId, string $stickyNoteId)
    {
        return GetStickyNoteByIdQuery::run($this->client, $boardId, $stickyNoteId);
    }

    /**
     * Creates a connector
     * @param  string    $boardId
     * @param  Connector $connector
     * @return void
     */
    public function createConnector(string $boardId, Connector $connector)
    {
        return CreateConnectorCommand::run($this->client, $boardId, $connector);
    }

    /**
     * Updates a connector
     * @param  string    $boardId
     * @param  Connector $connector
     * @return void
     */
    public function updateConnector(string $boardId, Connector $connector)
    {
        return UpdateConnectorCommand::run($this->client, $boardId, $connector);
    }

    /**
     * Deletes a connector
     * @param  string $boardId
     * @param  string $connectorId
     * @return void
     */
    public function deleteConnector(string $boardId, string $connectorId)
    {
        return DeleteConnectorCommand::run($this->client, $boardId, $connectorId);
    }

    /**
     * Returns a connector from the board given an ID.
     * @param string $boardId The board ID.
     * @param string $connectorId The connector id.
     * @return Connector
     */
    public function getConnectorById(string $boardId, string $connectorId)
    {
        return GetConnectorByIdQuery::run($this->client, $boardId, $connectorId);
    }

    /**
     * Returns a list of connectors.
     * @return Connector[]
     */
    public function getConnectors(string $boardId)
    {
        return GetAllConnectors::run($this->client, $boardId);
    }


    /**
     * Returns a list of boards.
     * @return Board[]
     */
    public function getBoards()
    {
        return ListAllBoards::run($this->client);
    }

    /**
     * Returns a board by ID. 
     * @return Board
     */
    public function getBoardsById(string $boardId)
    {
        return ListBoardById::run($this->client, $boardId);
    }
}
