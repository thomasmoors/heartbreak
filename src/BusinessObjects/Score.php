<?php

namespace Heartbreak\BusinessObjects;

class Score
{
    public const LOSING_SCORE = 50;
    public int $value = 0;

    public function addPoints(int $points): void
    {
        $this->value += $points;
    }
}