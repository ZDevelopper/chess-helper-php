<?php

include('./Class/Grid.php');
include('./Class/Piece.php');
include('./Class/Pawn.php');
include('./Class/Bishop.php');
include('./Class/King.php');
include('./Class/Knight.php');
include('./Class/Queen.php');
include('./Class/Rook.php');



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

