<?php


class PawnMoves extends Piece
{
    public function possibleMoves() : void
    {
        if (str_contains($this->getPosition(), '2')) {
            array_push($this->possibleMoves, str_replace('2', '4', $this->getPosition()));
        }
        array_push($this->possibleMoves, str_replace(substr($this->getPosition(), 1, 2), substr($this->getPosition(), 1, 2) + 1, $this->getPosition()));
    }
}