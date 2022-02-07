<?php

class Cars
{
    public array $speeds;
    public int $currentElement = 0;
    
    public function __construct(){
        $this->setSpeeds();
    }

    private function setSpeeds(){
        $s = rand(4, 16);
        $this->speeds[0] = $s;
        $this->speeds[1] = 22 - $s;
    }

    public function setNewPosition(Track $track){
        $ce = $this->currentElement;
        $nextMove = $ce + 1;
        $trackSegment = ceil($nextMove / 40) - 1;
        $trackSegmentType = $track->track[$trackSegment];
        $nextTrackSegmentType = $track->track[$trackSegment + 1];
        $usedSpeed = $this->speeds[$trackSegmentType];
        
        $trackSegmentPosition = $ce/40;
        $remainingSegmentElements = (ceil($trackSegmentPosition) - $trackSegmentPosition) * 40;

        if($remainingSegmentElements >= $usedSpeed || $trackSegmentType == $nextTrackSegmentType){
            $this->currentElement += $usedSpeed;
        }else{
            $this->currentElement += $remainingSegmentElements + 1;
        }

        if($this->currentElement >= 2000){
            $this->currentElement = 2000;
        }

        return $this->currentElement;
    }
}