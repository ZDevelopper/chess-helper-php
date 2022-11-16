<?php

class RookMoves extends Piece
{
    public function possibleMoves() : void
    {
        $tempoTab = [];
        foreach ($this->letters as $letter) {
            if ($letter != substr($this->getPosition(), 0, 1)) {
                array_push($tempoTab, str_replace(substr($this->getPosition(), 0, 1), $letter, $this->getPosition()));
            }
        }
        for ($tempo = 1; $tempo <= $this->grid->getHeight(); $tempo++) {
            array_push($tempoTab, str_replace(substr($this->getPosition(), 1, 2), $tempo, $this->getPosition()));
        }
        $this->setPossibleMoves($tempoTab);
    }
}