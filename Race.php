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
        $this->setRaceResult();
    }

    public function setTrack(){
        $this->track = new Track;
    }

    public function setCars($carsQuantity){
        for($i = 0; $i < $carsQuantity; $i++){
            $this->cars[] = new Cars(count($this->track->elementTypes));
        }
    }

    public function setRaceResult(){
        $this->raceResult = new RaceResult;
    }

    public function runRace(){
        
        $this->raceResult = new RaceResult;
        $step = 0;
        $raceFinished = false;
        
        while(!$raceFinished){


            $step++;
            $raceFinished = true;
        }

        return $this->raceResult;
    }
}