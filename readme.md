All instructions are intended to be ran from the root of this repository

# initial setup

`composer i`

# run

### local

`php src/start.php`

### to redirect the output to a file

`php src/start.php > output.txt`

### docker

`docker build -t heartbreak . && docker run -it heartbreak`

# test

`php vendor\bin\phpunit tests\`

---

# Assessment

Write an application that simulates a simplified heartbreak card game with four players.

- Shuffle 32 cards (with a value of 7 or higher) and distribute the card among the players.
- A random picked player starts the game and puts a random card on the table.
- In turns, the other players try to put an as low as possible (suit) matching card on the
  table. If a player doesn’t have a matching card, the player puts a random card on the
  table.
- When all players have played a card, the player that played the highest matching card
  loses the round. The total points of all played cards for that round are added to the
  losing player’s total score. Then the next rounds starts with the next player.
- When all players ran out of cards, the deck will be reshuffled and distributed among the
  players. The game continues with the next player from the last round.
- When a player has 50 points or more, that game ends and that player has lost the
  game.
- The game should not be interactive. You simply create a game that follows the rules
  above.
- The application should be built without use of a framework. Of course you’re allowed to
  use composer and helper packages.
- Main features should be tested with PHPunit.

# Score

```
Card of heart suit: 1 point
Jack of clubs: 2 points
Queen of spades: 5 points
Other cards: 0 points
```

# Example output of application

The application should output the progress of the game via the console or a simple HTML
page. This should look like:

```
Starting a game with John, Jane, Jan, Otto
John has been dealt: ♦9 ♦10 ♥9 ♠K ♥A ♠A ♦J ♠7
Jane has been dealt: ♠8 ♥7 ♥10 ♣8 ♦Q ♦7 ♠9 ♦8
Jan has been dealt: ♣A ♥J ♥K ♥8 ♣7 ♥Q ♦A ♣10
Otto has been dealt: ♠10 ♣9 ♣K ♦K ♣Q ♠Q ♠J ♣J
Round 1: Jan starts the game
Jan plays: ♣7
Otto plays: ♣9
John plays: ♥K
Jane plays: ♣8
Otto played ♣9, the highest matching card of this match and got 1 point added to his total
score. Otto’s total score is 1 point.
Round 2: Otto start the game
...etc
Players ran out of cards. Reshuffle.
John has been dealt: ♠8 ♥7 ♥10 ♣8 ♦Q ♦7 ♠9 ♦8
Jane has been dealt: ♠10 ♣9 ♣K ♦K ♣Q ♠Q ♠J ♦J
Jan has been dealt: ♦9 ♦10 ♣J ♥9 ♠K ♥A ♠A ♣10
Otto has been dealt: ♣A ♥J ♥K ♠7 ♥8 ♣7 ♥Q ♦A
...etc
Jan loses the game!
Points:
Jan: 50
Jane: 32
John: 13
Otto: 40
```
