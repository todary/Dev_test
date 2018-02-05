<?php
/**
 * Created by PhpStorm.
 * User: todary
 * Date: 16/10/17
 * Time: 06:03 م
 */

namespace App\Transport;

class TransportFactory
{
    /**
     * @param string $type
     * @param string $trans_number
     * @param string $seat_number
     * @param string $from
     * @param string $to
     * @param string|null $gate
     * @param string|null $desc
     * @return Bus|Flight|Train
     */
    public static function createTransport(string $type, string $trans_number, string $seat_number, string $from, string $to, string $gate = '', string $desc = '')
    {
        switch ($type) {
            case 'bus':
                $busObject = new Bus($trans_number, $seat_number, $from, $to, $desc);
                return $busObject;
            case 'train':
                $busObject = new Train($trans_number, $seat_number, $from, $to, $desc);
                return $busObject;
            case 'flight':
                $flightObject = new Flight($trans_number, $seat_number, $from, $to, $gate, $desc);
                return $flightObject;
            default:
                throw new \InvalidArgumentException("$type is not a valid vehicle");
        }
    }

}
