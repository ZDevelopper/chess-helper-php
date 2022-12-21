<?php



class KnightMoves extends Piece implements PossibleMoves
{
    public function possibleMoves() : void{
        $tempoTab = [];
        $key = array_search(substr($this->getPosition(),0,1),$this->letters);
        
        $tempo = str_replace(substr($this->getPosition(),1,2),substr($this->getPosition(),1,2)+2,$this->getPosition());
        if($key-1>=0){
            $tempo = str_replace(substr($tempo,0,1),$this->letters[$key-1],$tempo);
            array_push($tempoTab,$tempo);
        }
        
        if($key+1<=$this->grid->getHeight()){
            $tempo = str_replace(substr($tempo,0,1),$this->letters[$key+1],$tempo);
            array_push($tempoTab,$tempo);
        }


        $tempo = str_replace(substr($this->getPosition(),1,2),substr($this->getPosition(),1,2)+1,$this->getPosition());
        if($key-2>=0){
            $tempo = str_replace(substr($tempo,0,1),$this->letters[$key-2],$tempo);
            array_push($tempoTab,$tempo);
        }

        if($key+2<=$this->grid->getHeight()){
            $tempo = str_replace(substr($tempo,0,1),$this->letters[$key+2],$tempo);
            array_push($tempoTab,$tempo);
        }
        
        $tempo = str_replace(substr($this->getPosition(),1,2),substr($this->getPosition(),1,2)-1,$this->getPosition());
        if($key-2>=0){
            $tempo = str_replace(substr($tempo,0,1),$this->letters[$key-2],$tempo);
            array_push($tempoTab,$tempo);
        }

        if($key+2<=$this->grid->getHeight()){
            $tempo = str_replace(substr($tempo,0,1),$this->letters[$key+2],$tempo);
            array_push($tempoTab,$tempo);
        }

        $tempo = str_replace(substr($this->getPosition(),1,2),substr($this->getPosition(),1,2)-2,$this->getPosition());
        if($key-1>=0){
            $tempo = str_replace(substr($tempo,0,1),$this->letters[$key-1],$tempo);
            array_push($tempoTab,$tempo);
        }
        
        if($key+1<=$this->grid->getHeight()){
            $tempo = str_replace(substr($tempo,0,1),$this->letters[$key+1],$tempo);
            array_push($tempoTab,$tempo);
        }

        $this->setPossibleMoves($tempoTab);
    }
}