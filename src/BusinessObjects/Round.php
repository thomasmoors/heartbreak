<?php

namespace Heartbreak\BusinessObjects;

use Heartbreak\Collections\MoveCollection;
use Heartbreak\Helpers\Str;

class Round
{
    public Player $startingPlayer;
    public MoveCollection $moves;

    public function __construct(Player $startingPlayer, int $roundIndex)
    {
        $this->startingPlayer = $startingPlayer;
        $this->moves = new MoveCollection();

        Str::printLn("Round {$roundIndex}: {$startingPlayer->name} starts the game");

        Game::instance()->players->forEach(function (Player $player) {
            $player->playCard($this->moves);
        }, $this->startingPlayer);

        if ($this->finished()) {
            $this->loser()->addPoints($this->moves->points());
        }
    }

    public function loser(): Player
    {
        return $this->moves->loser();
    }

    public function finished(): bool
    {
        return $this->moves->count() === Game::instance()->players->count();
    }
}