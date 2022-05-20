<?php

/**
 * Single vehicle class.
 */
class Vehicle
{
    public function __construct(
        protected string $vehicleType = '',
        protected int $vehicleSpeed = 0,
        protected int $distance = 0,
    ) {
    }

    public function setType(string $type): void 
    {
        $this->vehicleType = $type;
    }

    public function setSpeed(int $speed): void 
    {
        $this->vehicleSpeed = $speed;
    }

    public function setDistance(int $distance): void 
    {
        $this->distance = $distance;
    }

    protected function calculateDuration(): int|float
    {
        return ($this->distance / $this->vehicleSpeed) + $this->getExtraTime();
    }

    protected function getExtraTime(): int|float
    {
        return $this->vehicleType == "boat"
            ? 0.25
            : 0;
    }

    public function printDuration(): void
    {
        print($this->vehicleType . ": " . $this->calculateDuration());
    }
}