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

    public function setCars(){
        for($i = 0; $i < 5; $i++){
            $this->cars[] = new Cars();
        }
    }

    public function runRace(){
        $step = 0;
        $raceFinished = false;
        
        while(!$raceFinished){

            $carsPositions = [];

            foreach($this->cars as $car){
                $newPosition = $car->setNewPosition($this->track);

                if($newPosition == 2000){
                    $raceFinished = true;
                }

                $carsPositions[] = $newPosition;
            }

            $roundResult = new RoundResult($step, $carsPositions);

            $this->raceResult->setRoundResult($roundResult);

            $step++;

        }

        return $this->raceResult;
    }
}