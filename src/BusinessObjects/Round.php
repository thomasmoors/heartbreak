<?php

namespace LenderSpender\BusinessObjects;

class Round
{
    public Player $startingPlayer;
    public Game $game;
    public Deck $deck;

    public function __construct(Player $startingPlayer, Game $game)
    {
        $this->deck = new Deck();
        $this->startingPlayer = $startingPlayer;
        $this->game = $game;
        $this->dealCards();
    }

    public function dealCards()
    {
        $handSize = count($this->deck->cards) / count($this->game->players);

        /** @var Player $player */
        foreach ($this->game->players as $key => $player) {
            $player->hand = array_slice($this->deck->cards, $key * $handSize, $handSize);
            $handString = implode(', ', $player->hand);
            echo "{$player->name} got cards {$handString}" . PHP_EOL;
        }
    }
}