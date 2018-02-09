<?php

use App\Transport\Bus;

/**
 * Class BusTest
 */
class BusTest extends \PHPUnit\Framework\TestCase
{

    public function setUp()
    {
        $object2 = new Bus('', '', 'Gerona Airport', 'Barcelona', 'Gerona Airport');

    }

    /**
     * @dataProvider providerMethod
     */

    public function testBus($result, $object, $method)
    {
        $this->assertEquals($result,$object->$method());
    }


    public static function providerMethod()
    {
        return [
            [
                'Gerona Airport',
                new Bus('', '', 'Gerona Airport', 'Barcelona', 'Gerona Airport')
                , 'getFrom'
            ],

            [
                'Barcelona',
                new Bus('', '', 'Gerona Airport', 'Barcelona', 'Gerona Airport')
                , 'getTo'
            ],


            [
                'Gerona Airport',
                new Bus('', '', 'Gerona Airport', 'Barcelona', 'Gerona Airport')
                , 'getDesc'
            ],


            [
                'A123',
                new Bus('A123', '123', 'Gerona Airport', 'Barcelona', 'Gerona Airport')
                , 'getTransNumber'
            ],


            [
                '123',
                new Bus('A123', '123', 'Gerona Airport', 'Barcelona', 'Gerona Airport')
                , 'getSeatNumber'
            ],

            [
                'Take Bus from Gerona Airport to Barcelona. 123 Sit in seat',
                new Bus('A123', '123', 'Gerona Airport', 'Barcelona', '')
                , 'display'
            ],
        ];
    }
}
