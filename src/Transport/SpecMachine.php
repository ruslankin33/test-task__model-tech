<?php

namespace App\Transport;

use Symfony\Component\Config\Definition\Exception\Exception;

class SpecMachine extends Transport
{
    private ?string $extra;

    public function __construct(
        string $carType,
        string $brand,
        string $carrying,
        string $photoFileName,
        string $extra
    )
    {
        parent::__construct($carType, $brand, $carrying, $photoFileName);

        if (empty($extra)) {
            throw new Exception("Empty extra");
        }
        $this->extra = $extra;
    }

    public function getExtra(): ?string
    {
        return $this->extra;
    }

    public function setExtra(string $extra): static
    {
        $this->extra = $extra;

        return $this;
    }
}
