<?php

namespace LenderSpender\BusinessObjects;

use Exception;
use LenderSpender\Collections\MoveCollection;
use LenderSpender\Helpers\Str;

class Round
{
    public Player $startingPlayer;
    public Game $game;
    public MoveCollection $moves;

    public function __construct(Player $startingPlayer, int $roundIndex, Game $game)
    {
        $this->startingPlayer = $startingPlayer;
        $this->game = $game;
        $this->moves = new MoveCollection();

        Str::printLn("Round {$roundIndex}: {$startingPlayer->name} starts the game");

        $this->game->players->forEach($this->startingPlayer, function (Player $player) {
            $player->playCard($this->moves);
        });
    }

    public function getLoser(): Player {
        throw new Exception('Not implemented');
    }
}