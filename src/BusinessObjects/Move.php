<?php

namespace LenderSpender\BusinessObjects;

class Move
{
    public Card $card;
    public Player $player;

    public function __construct(Card $card, Player $player)
    {
        $this->card = $card;
        $this->player = $player;
    }
}