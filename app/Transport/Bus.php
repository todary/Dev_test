<?php


namespace App\Transport;
/**
 * Class Bus
 * @package App\Vehicle
 */
class Bus extends Transport
{


    /**
     * Bus constructor.
     * @param string $trans_number
     * @param string $seat_number
     * @param string $from
     * @param string $to
     */
    public function __construct(string $trans_number, string $seat_number, string $from, string $to, string $desc)
    {
        $this->trans_number = $trans_number;
        $this->seat_number = $seat_number;
        $this->from = $from;
        $this->to = $to;
        $this->desc = $desc;
    }

    /**
     * @return mixed
     */
    public function getTransNumber()
    {
        return $this->trans_number;
    }

    /**
     * @return mixed
     */
    public function getSeatNumber()
    {
        return $this->seat_number;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**This functio used to Display test in Display
     * @return mixed|string
     */
    public function display()
    {
        $display = 'Take Bus from ' . $this->getFrom() . ' to ' . $this->getTo() . '. ' ;
        if (isset($this->seat_number)){
            $display .=$this->getSeatNumber() . ' Sit in seat' ;
        }
        if (isset($this->desc)){
            $display .=$this->getDesc();
        }
        return $display;
    }
}
