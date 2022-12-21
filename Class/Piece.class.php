<?php 

include('./Interfaces/possibleMoves.interface.php');

class Piece implements PossibleMoves
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

    public function possibleMoves(): void
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