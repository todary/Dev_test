<?php
/**
 * Created by PhpStorm.
 * User: todary
 * Date: 17/10/17
 * Time: 11:35 ص
 */

use App\Transport\Train;

/**
 * Class BusTest
 */
class TrainTest extends \PHPUnit\Framework\TestCase
{

    public function setUp()
    {
        $object2 = new Train('', '', 'Gerona Airport', 'Barcelona', 'Gerona Airport');

    }

    /**
     * @dataProvider providerMethod
     */

    public function testTrain($result, $object, $method)
    {
        $this->assertEquals($result,$object->$method());
    }


    public static function providerMethod()
    {
        return [
            [
                'Gerona Airport',
                new Train('', '', 'Gerona Airport', 'Barcelona', 'Gerona Airport')
                , 'getFrom'
            ],

            [
                'Barcelona',
                new Train('', '', 'Gerona Airport', 'Barcelona', 'Gerona Airport')
                , 'getTo'
            ],


            [
                'Gerona Airport',
                new Train('', '', 'Gerona Airport', 'Barcelona', 'Gerona Airport')
                , 'getDesc'
            ],


            [
                'A123',
                new Train('A123', '123', 'Gerona Airport', 'Barcelona', 'Gerona Airport')
                , 'getTransNumber'
            ],


            [
                '123',
                new Train('A123', '123', 'Gerona Airport', 'Barcelona', 'Gerona Airport')
                , 'getSeatNumber'
            ],

            [
                'Take Train from Gerona Airport to Barcelona. 123 Sit in seat',
                new Train('A123', '123', 'Gerona Airport', 'Barcelona', '')
                , 'display'
            ],
        ];
    }
}
