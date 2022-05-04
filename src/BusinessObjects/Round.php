<?php

namespace LenderSpender\BusinessObjects;

class Round
{
    public Player $startingPlayer;
    public Game $game;
    public Deck $deck;

    public function __construct(Player $startingPlayer, int $roundIndex, Game $game)
    {
        echo "Round {$roundIndex}: {$startingPlayer->name} starts the game" . PHP_EOL;
        $this->startingPlayer = $startingPlayer;
        $this->game = $game;
        $this->deck = new Deck();
        $this->dealCards();
    }

    public function dealCards()
    {
        // This can be a const, but only if the number of players is always the same
        $handSize = $this->deck->count() / $this->game->players->count();

        /** @var Player $player */
        foreach ($this->game->players as $key => $player) {

            $player->receiveHand($this->deck->dealHand($handSize));

            echo "{$player->name} has been dealt: {$player->hand}" . PHP_EOL;
        }
    }
}