<?php

namespace App\Transport;

use Symfony\Component\Config\Definition\Exception\Exception;

abstract class Transport
{
    const TRANSPORT_TYPE = [
        "car",
        "truck",
        "spec_machine"
    ];

    private ?string $carType;

    private ?string $brand;

    private ?float $carrying;

    private ?string $photoFileName;

    public function __construct(
        string $carType,
        string $brand,
        string $carrying,
        string $photoFileName,
    )
    {
        if (!in_array($carType, self::TRANSPORT_TYPE)) {
            throw new Exception("Undefined transport");
        }
        if (empty($brand)) {
            throw new Exception("Empty brand");
        }
        if (!is_numeric($carrying)) {
            throw new Exception("Carrying is not numeric");
        }
        if (empty($photoFileName)) {
            throw new Exception("Empty photo file name");
        }

        $this->carType = $carType;
        $this->brand = $brand;
        $this->carrying = (float)$carrying;
        $this->photoFileName = $photoFileName;
    }

    public function getCarType(): ?string
    {
        return $this->carType;
    }

    public function setCarType(string $carType): static
    {
        $this->carType = $carType;

        return $this;
    }

    public function getPhotoFileName(): ?string
    {
        return $this->photoFileName;
    }

    public function setPhotoFileName(string $photoFileName): static
    {
        $this->photoFileName = $photoFileName;

        return $this;
    }

    public function getPhotoFileExt(): string
    {
        return mb_substr($this->photoFileName, mb_strripos($this->photoFileName, '.') + 1);
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getCarrying(): ?float
    {
        return $this->carrying;
    }

    public function setCarrying(float $carrying): static
    {
        $this->carrying = $carrying;

        return $this;
    }
}
