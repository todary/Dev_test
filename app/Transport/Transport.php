<?php

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

    public abstract  function getTransNumber() ;
    public abstract  function getSeatNumber();
    public abstract  function getFrom();
    public abstract  function getTo();
    public abstract  function getDesc();

}