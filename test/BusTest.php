<?php
/**
 * Created by PhpStorm.
 * User: todary
 * Date: 17/10/17
 * Time: 11:35 ص
 */

use App\Transport\Bus;

/**
 * Class BusTest
 */
class BusTest extends \PHPUnit\Framework\TestCase
{
    /**
     *
     */
    public function testBus()
    {
        $car = new Bus('bus','','','Barcelona',' Gerona Airport','',' No seat assignment');

        $data =["trans_number"=>"bus","seat_number"=>"","from"=>"","to"=>"Barcelona","desc"=>" Gerona Airport"];

        $this->assertEquals(json_encode($data), $car->getJson());
    }


}
