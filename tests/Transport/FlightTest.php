
<?php
/**
 * Created by PhpStorm.
 * User: todary
 * Date: 17/10/17
 * Time: 11:35 ص
 */

use App\Transport\Flight;

/**
 * Class BusTest
 */
class FlightTest extends \PHPUnit\Framework\TestCase
{

    public function setUp()
    {
        $object2 = new Flight('', '', 'Gerona Airport', 'Barcelona', '22','Baggage will we automatically transferred from your last leg');

    }

    /**
     * @dataProvider providerMethod
     */

    public function testFlight($result, $object, $method)
    {
        $this->assertEquals($result,$object->$method());
    }


    public static function providerMethod()
    {
        return [
            [
                'Gerona Airport',
                new Flight('', '', 'Gerona Airport', 'Barcelona', '22','Baggage will we automatically transferred from your last leg')
                , 'getFrom'
            ],

            [
                'Barcelona',
                new Flight('', '', 'Gerona Airport', 'Barcelona', '22','Baggage will we automatically transferred from your last leg')
                , 'getTo'
            ],


            [
                'Baggage will we automatically transferred from your last leg',
                new Flight('', '', 'Gerona Airport', 'Barcelona', '22','Baggage will we automatically transferred from your last leg')
                , 'getDesc'
            ],


            [
                'A123',
                new Flight('A123', '123', 'Gerona Airport', 'Barcelona', '22','Baggage will we automatically transferred from your last leg')
                , 'getTransNumber'
            ],


            [
                '123',
                new Flight('A123', '123', 'Gerona Airport', 'Barcelona', '22','Baggage will we automatically transferred from your last leg')
                , 'getSeatNumber'
            ],

            [
                'Take Flight from Gerona Airport to Barcelona. A123 Take Flight 22 Gate 123 Sit in seat Baggage will we automatically transferred from your last leg',
                new Flight('A123', '123', 'Gerona Airport', 'Barcelona', '22','Baggage will we automatically transferred from your last leg')
                , 'display'
            ],
        ];
    }
}
