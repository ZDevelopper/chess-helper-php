<?php 


class QueenMoves extends Piece
{
    public function possibleMoves() : void
    {
        $tempoTab = [];
        foreach ($this->letters as $key => $letter) {
            if ($letter != substr($this->getPosition(), 0, 1)) {
                $tempo = str_replace(substr($this->getPosition(), 0, 1), $letter, $this->getPosition());
                $tempo = str_replace(substr($tempo, 1, 2), substr($this->getPosition(), 1, 2) - (array_search(substr($this->getPosition(), 0, 1), $this->letters) - $key), $tempo);
                array_push($tempoTab, $tempo);
                $tempo = str_replace(substr($this->getPosition(), 0, 1), $letter, $this->getPosition());
                $tempo = str_replace(substr($tempo, 1, 2), substr($this->getPosition(), 1, 2) + (array_search(substr($this->getPosition(), 0, 1), $this->letters) - $key), $tempo);
                array_push($tempoTab, $tempo);
            }
        }
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