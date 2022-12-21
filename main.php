<?php

include('./autoload/autoload.php');

echo 'Pion:' . PHP_EOL;
$piece = new PawnMoves('C3');
$piece->show();
echo 'Tour:' . PHP_EOL;
$piece = new RookMoves('D2');
$piece->show();
echo 'Fou:' . PHP_EOL;
$piece = new BishopMoves('E5');
$piece->show();
echo 'Reine:' . PHP_EOL;
$piece = new QueenMoves('A6');
$piece->show();
echo 'Roi:' . PHP_EOL;
$piece = new KingMoves('G4');
$piece->show();
echo 'Chevalier:' . PHP_EOL;
$piece = new KnightMoves('D4');
$piece->show();

