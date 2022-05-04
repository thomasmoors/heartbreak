<?php

namespace LenderSpender\BusinessObjects;

class Round
{
    public Player $startingPlayer;
    public Game $game;

    public function __construct(Player $startingPlayer, int $roundIndex, Game $game)
    {
        $this->startingPlayer = $startingPlayer;
        $this->game = $game;
        echo "Round {$roundIndex}: {$startingPlayer->name} starts the game" . PHP_EOL;
    }
}