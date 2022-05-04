<?php

namespace LenderSpender\BusinessObjects;

use LenderSpender\Helpers\Str;

class Round
{
    public Player $startingPlayer;
    public Game $game;

    public function __construct(Player $startingPlayer, int $roundIndex, Game $game)
    {
        $this->startingPlayer = $startingPlayer;
        $this->game = $game;
        Str::printLn("Round {$roundIndex}: {$startingPlayer->name} starts the game");
    }
}