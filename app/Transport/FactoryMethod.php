<?php

/**
 * Created by PhpStorm.
 * User: todary
 * Date: 17/10/17
 * Time: 02:17 م
 */

namespace App\Vehicle;
/**
 * Class FactoryMethod
 * @package App\Vehicle
 */
abstract class FactoryMethod
{
    const CAR = 'car';
    const MOTORCYCLE = 'motorcycle';
    const BUS = 'bus';

    /**
     * @param string $type
     * @return VehicleInterface
     */
    abstract protected function createVehicle(string $trans_number, string $seat_number, string $from, string $to): VehicleInterface;

    /**
     * @param string $trans_number
     * @param string $seat_number
     * @param string $from
     * @param string $to
     * @return VehicleInterface
     */
    public function create(string $trans_number, string $seat_number, string $from, string $to): VehicleInterface
    {
        $object = $this->createVehicle($type, $speed, $fuelTank, $fuelConsumptionRate, $distance);
        return $object;
    }


}