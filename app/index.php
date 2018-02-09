<?php


include "../vendor/autoload.php";




use App\Library\Sorter;

$transportArray =[];
$transportArray[] = \App\Transport\TransportFactory::createTransport('flight','SK522','7B','Stockholm','GFK','22','Baggage will we automatically transferred from your last leg');
$transportArray[] = \App\Transport\TransportFactory::createTransport('bus','','','Barcelona','Gerona Airport','',' No seat assignment');
$transportArray[] = \App\Transport\TransportFactory::createTransport('train','78A','45B','Madrid','Barcelona');
$transportArray[] = \App\Transport\TransportFactory::createTransport('flight','SK544','3A','Gerona Airport','Stockholm','45G');

$items = Sorter::sort($transportArray);
$string ='<pre>';

foreach ($items as $item){
    $string .= $item->display();
    $string .= '<hr>';
}
$string .='</pre>';

echo  $string;