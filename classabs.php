<?php

abstract class HighWay
{
    protected $currentVehicles = [];
    protected $nbLane;
    protected $maxSpeed;

    public function __construct(int $nbLane, int $maxSpeed)
    {
        $this->nbLane = $nbLane;
        $this->maxSpeed = $maxSpeed;
    }

    public function getCurrentVehicles(): array
    {
        return $this->currentVehicles;
    }

    public function getNbLane(): int
    {
        return $this->nbLane;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    abstract public function addVehicle(Vehicle $vehicle): void;
}

final class MotorWay extends HighWay
{
    public function addVehicle(Vehicle $vehicle): void
    {
        if ($vehicle instanceof Car) {
            $this->currentVehicles[] = $vehicle;
        }
    }
}

final class ResidentialWay extends HighWay
{
    public function addVehicle(Vehicle $vehicle): void
    {
        $this->currentVehicles[] = $vehicle;
    }
}

final class PedestrianWay extends HighWay
{
    public function addVehicle(Vehicle $vehicle): void
    {
        if ($vehicle instanceof Bike || $vehicle instanceof Skateboard) {
            $this->currentVehicles[] = $vehicle;
        }
    }
}

class Vehicle
{
    // Base class for vehicles
}

class Car extends Vehicle
{
    // Car class
}

class Bike extends Vehicle
{
    // Bike class
}

class Skateboard extends Vehicle
{
    // Skateboard class
}

// Example usage:
$motorway = new MotorWay(4, 130);
$residentialWay = new ResidentialWay(2, 50);
$pedestrianWay = new PedestrianWay(1, 10);

$car = new Car();
$bike = new Bike();
$skateboard = new Skateboard();

$motorway->addVehicle($car); // Adds a car to the motorway
$residentialWay->addVehicle($bike); // Adds a bike to the residential way
$pedestrianWay->addVehicle($skateboard); // Adds a skateboard to the pedestrian way
