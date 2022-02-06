<?php

class Cars
{
    public int $elementTypes;
    public int $speedSum;
    public int $minSpeed;
    public array $speeds;
    public int $currentElement = 0;
    
    public function __construct($elementTypes, $speedSum = 22, $minSpeed = 4){
        $this->elementTypes = $elementTypes;
        $this->speedSum = $speedSum;
        $this->minSpeed = $minSpeed;
        $this->setSpeeds();
    }

    public function setSpeeds(){

        $maxSpeed = $this->speedSum - $this->minSpeed * ($this->elementTypes - 1);

        for($i = 0; $i < $this->elementTypes - 1; $i++){
            $s = rand($this->minSpeed, $maxSpeed);
            $this->speeds[$i] = $s >= $this->minSpeed ? $s : $this->minSpeed;
            $maxSpeed = $maxSpeed - $s + $this->minSpeed;
        }

        $s = $this->speedSum - array_sum($this->speeds);
        $this->speeds[$i] = $s >= $this->minSpeed ? $s : $this->minSpeed;

    }
}