<?php

include 'Track.php';
include 'Cars.php';
include 'RoundResult.php';
include 'RaceResult.php';

class Race
{
    public Track $track;
    public array $cars;
    public RaceResult $raceResult;

    public function __construct($carsQuantity = 5)
    {
        $this->setTrack();
        $this->setCars($carsQuantity);
        $this->raceResult = new RaceResult;
    }

    public function setTrack(){
        $this->track = new Track;
    }

    public function setCars($carsQuantity){
        for($i = 0; $i < $carsQuantity; $i++){
            $this->cars[] = new Cars(count($this->track->elementTypes));
        }
    }

    public function runRace(){
        
        $step = 0;
        $raceFinished = false;
        
        while(!$raceFinished){

            $carsPositions = [];

            foreach($this->cars as $car){
                $ce = $car->currentElement;
                $nextMove = $ce + 1;
                $trackSegment = ceil($nextMove / $this->track->elementsSeries) - 1;
                $trackSegmentType = $this->track->track[$trackSegment];
                $nextTrackSegmentType = $this->track->track[$trackSegment + 1];
                $usedSpeed = $car->speeds[$trackSegmentType];
                $trackSeries = $this->track->elementsSeries;

                $trackSegmentPosition = $ce/$trackSeries;
                $remainingSegmentElements = (ceil($trackSegmentPosition) - $trackSegmentPosition) * $trackSeries;

                if($remainingSegmentElements >= $usedSpeed || $trackSegmentType == $nextTrackSegmentType){
                    $car->currentElement += $usedSpeed;
                }else{
                    $car->currentElement += $remainingSegmentElements + 1;
                }

                if($car->currentElement >= $this->track->trackElements){
                    $car->currentElement = $this->track->trackElements;
                    $raceFinished = true;
                }

                $carsPositions[] = $car->currentElement;

            }

            $roundResult = new RoundResult($step, $carsPositions);

            $this->raceResult->setRoundResult($roundResult);

            $step++;

        }

        return $this->raceResult;
    }
}