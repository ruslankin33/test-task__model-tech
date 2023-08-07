<?php

namespace App\Transport;

class Car extends Transport
{
    private ?int $passengerSeatsCount;

    public function __construct(
        string $carType,
        string $brand,
        string $carrying,
        string $photoFileName,
        string $passengerSeatsCount
    )
    {
        parent::__construct($carType, $brand, $carrying, $photoFileName);
        $this->passengerSeatsCount = (int)$passengerSeatsCount;
    }

    public function getPassengerSeatsCount(): ?int
    {
        return $this->passengerSeatsCount;
    }

    public function setPassengerSeatsCount(int $passengerSeatsCount): static
    {
        $this->passengerSeatsCount = $passengerSeatsCount;

        return $this;
    }
}
