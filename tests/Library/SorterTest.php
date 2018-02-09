<?php

use App\Transport\TransportFactory;
use App\Transport\Bus;
use App\Transport\Train;
use App\Transport\Flight;
use App\Library\Sorter;


/**
 * Class BusTest
 */
class SorterTest extends \PHPUnit\Framework\TestCase
{
    private $transportArray = [];

    public function setUp()
    {
        $this->transportArray[] = TransportFactory::createTransport('flight', 'SK522', '7B', 'Stockholm', 'GFK', '22', 'Baggage will we automatically transferred from your last leg');
        $this->transportArray[] = TransportFactory::createTransport('bus', '', '', 'Barcelona', 'Gerona Airport', '', '');
        $this->transportArray[] = TransportFactory::createTransport('train', '78A', '45B', 'Madrid', 'Barcelona');
        $this->transportArray[] = TransportFactory::createTransport('flight', 'SK544', '3A', 'Gerona Airport', 'Stockholm', '45G');

    }


    public function testGetStartTransports()
    {
        $array = [
            'Stockholm' => new Flight('SK522', '7B', 'Stockholm', 'GFK', '22', 'Baggage will we automatically transferred from your last leg'),
            'Barcelona' => new Bus('', '', 'Barcelona', 'Gerona Airport', '', ''),
            'Madrid' => new Train('78A', '45B', 'Madrid', 'Barcelona', ''),
            'Gerona Airport' => new Flight('SK544', '3A', 'Gerona Airport', 'Stockholm', '45G', ''),
        ];
        $sorterObject = new Sorter();

        $this->assertEquals($array, $sorterObject->getStartTransports($this->transportArray));
    }


    public function testArrivalTransports()
    {
        $array = [
            'GFK' => new Flight('SK522', '7B', 'Stockholm', 'GFK', '22', 'Baggage will we automatically transferred from your last leg'),
            'Gerona Airport' => new Bus('', '', 'Barcelona', 'Gerona Airport', '', ''),
            'Barcelona' => new Train('78A', '45B', 'Madrid', 'Barcelona', ''),
            'Stockholm' => new Flight('SK544', '3A', 'Gerona Airport', 'Stockholm', '45G', ''),
        ];
        $sorterObject = new Sorter();
        $this->assertEquals($array, $sorterObject->getArrivalTransports($this->transportArray));
    }


    public function testFirstLocation()
    {
        $array = [
            'GFK' => new Flight('SK522', '7B', 'Stockholm', 'GFK', '22', 'Baggage will we automatically transferred from your last leg'),
            'Gerona Airport' => new Bus('', '', 'Barcelona', 'Gerona Airport', '', ''),
            'Barcelona' => new Train('78A', '45B', 'Madrid', 'Barcelona', ''),
            'Stockholm' => new Flight('SK544', '3A', 'Gerona Airport', 'Stockholm', '45G', ''),
        ];
        $sorterObject = new Sorter();
        $this->assertEquals('Madrid', $sorterObject->getFirstLocation($this->transportArray, $array));
    }


    public function testMakeSorting()
    {
        $array = [
            'Stockholm' => new Flight('SK522', '7B', 'Stockholm', 'GFK', '22', 'Baggage will we automatically transferred from your last leg'),
            'Barcelona' => new Bus('', '', 'Barcelona', 'Gerona Airport', '', ''),
            'Madrid' => new Train('78A', '45B', 'Madrid', 'Barcelona', ''),
            'Gerona Airport' => new Flight('SK544', '3A', 'Gerona Airport', 'Stockholm', '45G', ''),
        ];

        $arraySorted = [
            new Train('78A', '45B', 'Madrid', 'Barcelona', ''),
            new Bus('', '', 'Barcelona', 'Gerona Airport', '', ''),
            new Flight('SK544', '3A', 'Gerona Airport', 'Stockholm', '45G', ''),
            new Flight('SK522', '7B', 'Stockholm', 'GFK', '22', 'Baggage will we automatically transferred from your last leg'),
        ];

        $sorterObject = new Sorter();
        $this->assertEquals($arraySorted, $sorterObject->makeSorting('Madrid', $array));
    }


    public function testSort()
    {

        $stub = $this->getMockBuilder(Sorter::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        // Configure the stub.
        $stub->method('doSomething')
            ->willReturn('foo');


        $mockCollection = Mockery::mock(Collection::class);
        $mockCollection->shouldReceive('get_collection_ids')->once()->andReturn([1, 2, 3, 4, 5, 6]);

        $array = [
            'Stockholm' => new Flight('SK522', '7B', 'Stockholm', 'GFK', '22', 'Baggage will we automatically transferred from your last leg'),
            'Barcelona' => new Bus('', '', 'Barcelona', 'Gerona Airport', '', ''),
            'Madrid' => new Train('78A', '45B', 'Madrid', 'Barcelona', ''),
            'Gerona Airport' => new Flight('SK544', '3A', 'Gerona Airport', 'Stockholm', '45G', ''),
        ];

        $arraySorted = [
            new Train('78A', '45B', 'Madrid', 'Barcelona', ''),
            new Bus('', '', 'Barcelona', 'Gerona Airport', '', ''),
            new Flight('SK544', '3A', 'Gerona Airport', 'Stockholm', '45G', ''),
            new Flight('SK522', '7B', 'Stockholm', 'GFK', '22', 'Baggage will we automatically transferred from your last leg'),
        ];

        $sorterObject = new Sorter();
        $this->assertEquals($arraySorted, $sorterObject->makeSorting('Madrid', $array));
    }






}
