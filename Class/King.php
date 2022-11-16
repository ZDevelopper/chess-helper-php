<?php




class KingMoves extends Piece
{
    public function possibleMoves() : void{
        $tempoTab = [];
        $key = array_search(substr($this->getPosition(),0,1),$this->letters);

        $tempo = str_replace(substr($this->getPosition(),0,1),$this->letters[$key-1],$this->getPosition());
        array_push($tempoTab,$tempo);
        
        $tempo = str_replace(substr($tempo,1,2),substr($this->getPosition(),1,2)-1,$this->getPosition());
        array_push($tempoTab,$tempo);

        $tempo = str_replace(substr($this->getPosition(),0,1),$this->letters[$key+1],$this->getPosition());
        array_push($tempoTab,$tempo);

        $tempo = str_replace(substr($this->getPosition(),0,1),$this->letters[$key-1],$this->getPosition());
        $tempo = str_replace(substr($tempo,1,2),substr($tempo,1,2)-1,$tempo);
        array_push($tempoTab,$tempo);

        $tempo = str_replace(substr($this->getPosition(),0,1),$this->letters[$key-1],$this->getPosition());
        $tempo = str_replace(substr($tempo,1,2),substr($tempo,1,2)+1,$tempo);
        array_push($tempoTab,$tempo);

        $tempo = str_replace(substr($this->getPosition(),0,1),$this->letters[$key+1],$this->getPosition());
        $tempo = str_replace(substr($tempo,1,2),substr($tempo,1,2)-1,$tempo);
        array_push($tempoTab,$tempo);

        $tempo = str_replace(substr($this->getPosition(),0,1),$this->letters[$key+1],$this->getPosition());
        $tempo = str_replace(substr($tempo,1,2),substr($tempo,1,2)+1,$tempo);
        array_push($tempoTab,$tempo);

        $tempo = str_replace(substr($this->getPosition(),0,1),$this->letters[$key],$this->getPosition());
        $tempo = str_replace(substr($tempo,1,2),substr($tempo,1,2)+1,$tempo);
        array_push($tempoTab,$tempo);

        $this->setPossibleMoves($tempoTab);

    }
}