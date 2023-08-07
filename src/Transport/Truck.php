<?php

namespace App\Transport;

use Symfony\Component\Config\Definition\Exception\Exception;

class Truck extends Transport
{
    private ?float $bodyWidth;

    private ?float $bodyHeight;

    private ?float $bodyLength;

    public function __construct(
        string $carType,
        string $brand,
        float  $carrying,
        string $photoFileName,
        string $bodyWhl
    )
    {
        parent::__construct($carType, $brand, $carrying, $photoFileName);

        if ($bodyWhl === '') {
            $this->bodyLength = $this->bodyWidth = $this->bodyHeight = 0;
        } else {
            $explode = explode('x', $bodyWhl);
            if (count($explode) !== 3) {
                throw new Exception("Incorrect bodyWhl");
            }
            $this->bodyLength = (float)$explode[0];
            $this->bodyWidth = (float)$explode[1];
            $this->bodyHeight = (float)$explode[2];
        }
    }

    public function getBodyWidth(): ?float
    {
        return $this->bodyWidth;
    }

    public function setBodyWidth(float $bodyWidth): static
    {
        $this->bodyWidth = $bodyWidth;

        return $this;
    }

    public function getBodyHeight(): ?float
    {
        return $this->bodyHeight;
    }

    public function setBodyHeight(float $bodyHeight): static
    {
        $this->bodyHeight = $bodyHeight;

        return $this;
    }

    public function getBodyLength(): ?float
    {
        return $this->bodyLength;
    }

    public function setBodyLength(float $bodyLength): static
    {
        $this->bodyLength = $bodyLength;

        return $this;
    }

    public function getBodyVolume(): float
    {
        return $this->bodyHeight * $this->bodyLength * $this->bodyWidth;
    }
}
