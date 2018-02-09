<?php
/**
 * Created by PhpStorm.
 * User: todary
 * Date: 17/10/17
 * Time: 11:35 ص
 */

use App\Transport\TransportFactory;
use App\Transport\Bus;
use App\Transport\Train;
use App\Transport\Flight;

/**
 * Class BusTest
 */
class TransportFactoryTest extends \PHPUnit\Framework\TestCase
{

    public function setUp()
    {
        $transportArray =[];
        $transportArray[] = TransportFactory::createTransport('flight','SK522','7B','Stockholm','GFK','22','Baggage will we automatically transferred from your last leg');
        $transportArray[] = TransportFactory::createTransport('bus','','','Barcelona','Gerona Airport','',' No seat assignment');
        $transportArray[] = TransportFactory::createTransport('train','78A','45B','Madrid','Barcelona');
        $transportArray[] = TransportFactory::createTransport('flight','SK544','3A','Gerona Airport','Stockholm','45G');

    }

    /**
     * @dataProvider providerMethod
     */

    public function testTrain($object, $objectFactory)
    {
        $this->assertEquals($object, $objectFactory);
    }


    public static function providerMethod()
    {
        return [
            [
                new Flight('SK522', '7B', 'Stockholm', 'GFK', '22', 'Baggage will we automatically transferred from your last leg')
                , TransportFactory::createTransport('flight', 'SK522', '7B', 'Stockholm', 'GFK', '22', 'Baggage will we automatically transferred from your last leg')
            ]
        ];
    }
}
