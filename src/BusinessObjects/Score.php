<?php

namespace LenderSpender\BusinessObjects;

class Score
{
    public const LOSING_SCORE = 50;
    public int $value = 0;

    public static function hasLoser(array $players): bool
    {
        /** @var Player $player */
        foreach ($players as $player) {
            if ($player->score->value >= self::LOSING_SCORE) {
                return true;
            }
        }

        return false;
    }

}