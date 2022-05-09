<?php


use Heartbreak\BusinessObjects\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function test_singleton()
    {
        $game1 = Game::instance();
        $game2 = Game::instance();

        $this->assertSame($game1, $game2);
    }

}
