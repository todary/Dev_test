<?php
/**
 * Created by PhpStorm.
 * User: todary
 * Date: 16/10/17
 * Time: 06:02 م
 */

namespace App\Transport;
/**
 * Interface VehicleInterface
 */
abstract class  Transport
{

    protected $trans_number;
    protected $seat_number;
    protected $from;
    protected $to;
    protected $desc;

    public abstract  function getJson();

}