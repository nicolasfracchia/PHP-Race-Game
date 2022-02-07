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

    public function setNewPosition(Track $track){
        $ce = $this->currentElement;
        $nextMove = $ce + 1;
        $trackSegment = ceil($nextMove / $track->elementsSeries) - 1;
        $trackSegmentType = $track->track[$trackSegment];
        $nextTrackSegmentType = $track->track[$trackSegment + 1];
        $usedSpeed = $this->speeds[$trackSegmentType];
        $trackSeries = $track->elementsSeries;

        $trackSegmentPosition = $ce/$trackSeries;
        $remainingSegmentElements = (ceil($trackSegmentPosition) - $trackSegmentPosition) * $trackSeries;

        if($remainingSegmentElements >= $usedSpeed || $trackSegmentType == $nextTrackSegmentType){
            $this->currentElement += $usedSpeed;
        }else{
            $this->currentElement += $remainingSegmentElements + 1;
        }

        if($this->currentElement >= $track->trackElements){
            $this->currentElement = $track->trackElements;
        }

        return $this->currentElement;
    }
}