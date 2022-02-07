<?php

class Track
{
    public array $track;
    private array $elementTypes = ['curve', 'straight'];

    public function __construct()
    {
        $this->setElements();
    }

    public function setElements(){
        
        for($i = 0; $i < 50; $i++){
            $this->track[] = array_rand($this->elementTypes, 1);
        }

    }
}