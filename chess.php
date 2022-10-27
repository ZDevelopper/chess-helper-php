<?php

class Grid
{

    private $width = 8;
    private $height = 8;

    public function getHeight()
    {
        return $this->height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function __construct()
    {
    }
}

class Piece
{

    protected $letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    protected $grid;

    private $position;
    public $possibleMoves = [];

    public function __construct($position)
    {
        $this->setPosition($position);
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function setPossibleMoves($possibleMoves)
    {
        $this->possibleMoves = $possibleMoves;
    }

    public function getPossibleMoves()
    {
        return $this->possibleMoves;
    }

    public function possibleMoves()
    {
    }

    public function show()
    {
        $this->grid = new Grid();
        $this->possibleMoves();
        for ($column = $this->grid->getHeight(); $column > 0; $column--) {
            for ($row = 0; $row < $this->grid->getWidth(); $row++) {
                if (array_search(substr($this->getPosition(), 0, 1), $this->letters) == $row && substr($this->getPosition(), 1, 2) == $column) {
                    echo "P";
                } else if (!empty($this->getPossibleMoves())) {
                    $countX = 0;
                    foreach ($this->getPossibleMoves() as $move) {
                        if (array_search(substr($move, 0, 1), $this->letters) == $row && substr($move, 1, 2) == $column) {
                            echo "X";
                            $countX++;
                        } /* else {
                            echo "-";
                        }*/
                    }
                    if ($countX != 0) {
                        $countX--;
                        continue;
                    }
                    echo "-";
                }
            }
            echo PHP_EOL;
        }
    }
}

class Pawn extends Piece
{
    public function possibleMoves()
    {
        if (str_contains($this->getPosition(), '2')) {
            array_push($this->possibleMoves, str_replace('2', '4', $this->getPosition()));
        }
        array_push($this->possibleMoves, str_replace(substr($this->getPosition(), 1, 2), substr($this->getPosition(), 1, 2) + 1, $this->getPosition()));
    }
}

class Knight extends Piece
{
    public function possibleMoves(){
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

class Rook extends Piece
{
    public function possibleMoves()
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

class Bishop extends Piece
{
    public function possibleMoves()
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
        $this->setPossibleMoves($tempoTab);
    }
}

class Queen extends Piece
{
    public function possibleMoves()
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


class King extends Piece
{
    public function possibleMoves(){
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

echo 'Pion:' . PHP_EOL;
$piece = new Pawn('C3');
$piece->show();
echo 'Tour:' . PHP_EOL;
$piece = new Rook('D2');
$piece->show();
echo 'Fou:' . PHP_EOL;
$piece = new Bishop('E5');
$piece->show();
echo 'Reine:' . PHP_EOL;
$piece = new Queen('A6');
$piece->show();
echo 'Roi:' . PHP_EOL;
$piece = new King('G4');
$piece->show();
echo 'Chevalier:' . PHP_EOL;
$piece = new Knight('D4');
$piece->show();

