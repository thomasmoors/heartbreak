<?php

namespace LenderSpender\BusinessObjects;

class Player
{
    public string $name;
    public Score $score;

    public array $hand;

    public function __construct($name)
    {
        $this->name = $name;
        $this->score = new Score();
    }
}