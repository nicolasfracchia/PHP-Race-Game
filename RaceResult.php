<?php

class RaceResult
{
    /**
     * @var array of StepResult
     */
    private $roundResults = [];

    public function getRoundResults(): array
    {
        return $this->roundResults;
    }

    public function setRoundResult(RoundResult $roundResult)
    {
        $this->roundResults[] = $roundResult;
    }
}
