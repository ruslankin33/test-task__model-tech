<?php

namespace App\Function;

use App\Transport\Car;
use App\Transport\SpecMachine;
use App\Transport\Truck;
use Symfony\Component\Config\Definition\Exception\Exception;

require __DIR__ . "/../../vendor/autoload.php";

function getCarList(string $fileName): ?array
{
    $file = __DIR__ . "/../../files/$fileName";
    $rows = array_map('trim', file($file));
    array_shift($rows);

    $transports = [];
    foreach ($rows as $row) {
        $values = array_map('trim', explode(';', $row));
        list($carType, $brand, $passengerSeatsCount, $photoFileName, $bodyWhl, $carrying, $extra) = $values;

        try {
            if ($carType === "car" && !empty($passengerSeatsCount)) {
                $transport = new Car($carType, $brand, $carrying, $photoFileName, $passengerSeatsCount);
            } else if ($carType === "truck") {
                $transport = new Truck($carType, $brand, $carrying, $photoFileName, $bodyWhl);
            } else if ($carType === "spec_machine") {
                $transport = new SpecMachine($carType, $brand, $carrying, $photoFileName, $extra);
            } else {
                throw new Exception("Undefined transport");
            }
            $transports[] = $transport;
        } catch (\Exception $e) {
            $st = 0;
        }
    }

    return $transports;
}

$transports = getCarList("Исходные данные для задания с машинами.csv");

print_r($transports);
