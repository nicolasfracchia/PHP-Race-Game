<?php

class Track
{
    public array $track;
    public int $trackElements;
    public int $elementsSeries;
    public array $elementTypes;

    public function __construct($trackElements = 2000, $elementsSeries = 40, $elementTypes = null)
    {
        $this->trackElements = $trackElements;
        $this->elementsSeries = $elementsSeries;
        $this->elementTypes = $elementTypes ? $elementTypes : ['curve', 'straight'];

        $this->setElements();
    }

    public function setElements(){
        
        for($i = 0; $i < $this->trackElements / $this->elementsSeries; $i++){
            $this->track[] = array_rand($this->elementTypes, 1);
        }

    }
}