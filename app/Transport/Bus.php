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

    public function getJson()
    {
        $arrayDat =[];
        $arrayDat['trans_number']=$this->trans_number;
        $arrayDat['seat_number']=$this->seat_number;
        $arrayDat['from']=$this->from;
        $arrayDat['to']=$this->to;
        $arrayDat['desc']=$this->desc;

        return json_encode($arrayDat);
    }
}
