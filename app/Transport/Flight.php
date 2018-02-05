<?php


namespace App\Transport;
/**
 * Class Bus
 * @package App\Vehicle
 */
class Flight extends Transport
{

    private $gate;

    /**
     * Bus constructor.
     * @param string $trans_number
     * @param string $seat_number
     * @param string $from
     * @param string $to
     */
    public function __construct(string $trans_number, string $seat_number, string $from, string $to, string $gate, string $desc)
    {
        $this->trans_number = $trans_number;
        $this->seat_number = $seat_number;
        $this->from = $from;
        $this->to = $to;
        $this->gate = $gate;
        $this->desc = $desc;
    }

    public function getJson()
    {
        $arrayDat =[];
        $arrayDat['trans_number']=$this->trans_number;
        $arrayDat['seat_number']=$this->seat_number;
        $arrayDat['from']=$this->from;
        $arrayDat['to']=$this->to;
        $arrayDat['gate']=$this->gate;
        $arrayDat['desc']=$this->desc;

        return json_encode($arrayDat);
    }
}
