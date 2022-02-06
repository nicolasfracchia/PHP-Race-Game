<?php


class RoundResult
{
    /**
     * @var int
     */
    public $step;

    /**
     * @var array
     */
    public $carsPosition; // POSITION ON THE TRACK, NOT THE ORDER!

    public function __construct(int $step, array $carsPosition)
    {
        $this->step = $step;
        $this->carsPosition = $carsPosition;
    }
}
