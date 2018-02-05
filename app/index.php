<?php


include "../vendor/autoload.php";




use App\Transport\DealWithFile;

$transportArray =[];
$transportArray[] = \App\Transport\TransportFactory::createTransport('train','78A','45B','Madrid','Barcelona');
$transportArray[] = \App\Transport\TransportFactory::createTransport('bus','','','Barcelona',' Gerona Airport','',' No seat assignment');
$transportArray[] = \App\Transport\TransportFactory::createTransport('flight','SK544','3A','Gerona Airport','Stockholm','45G');
$transportArray[] = \App\Transport\TransportFactory::createTransport('flight','SK522','7B','Stockholm','GFK','22','Baggage will we automatically transferred from your last leg');

$jsonData =[];
foreach ($transportArray as $transport){
    $jsonData [] =$transport->getJson();
}

DealWithFile::save($jsonData);
