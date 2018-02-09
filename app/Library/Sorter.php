<?php


namespace App\Library;

class Sorter
{


    /**
     * @param array $items
     * @return array Transport
     */
    public static function sort(array $items): array
    {
        $allStartLocation = self::getStartTransports($items);
        $allArrivalLocation = self::getArrivalTransports($items);
        $firstLocation = self::getFirstLocation($items, $allArrivalLocation);

        $arraySort = self::makeSorting($firstLocation, $allStartLocation);

        return $arraySort ;
    }

    /**
     * This function used to get all starts location for all transport
     * @param array $items
     * @return array
     */
    public static function getStartTransports(array $items): array
    {
        $startTransport = [];
        foreach ($items as $item) {
            $startTransport[$item->getFrom()] = $item;
        }
        return $startTransport;
    }


    /**
     * This function used to get all Arrival location for all transport
     * @param array $items
     * @return array
     */
    public static function getArrivalTransports(array $items): array
    {
        $startTransport = [];
        foreach ($items as $item) {
            $startTransport[$item->getTo()] = $item;
        }
        return $startTransport;
    }

    /**
     * @param $items
     * @param $allArrivalLocation
     * @return string|Null
     */
    public static function getFirstLocation($items, $allArrivalLocation)
    {
        foreach ($items as $item) {
            $firstLocation = $item->getFrom();
            if (!array_key_exists($firstLocation, $allArrivalLocation)) {
                return $firstLocation;
            }
        }
        return null;
    }

    /**
     * @param $firstLocation
     * @param $allStartLocation
     * @return null
     */
    public static function makeSorting($firstLocation, $allStartLocation)
    {
        $sortedTransport = [];
        $currentLocation = $firstLocation;
        while ($currentTransport = (array_key_exists($currentLocation, $allStartLocation)) ? $allStartLocation[$currentLocation] : null) {
            array_push($sortedTransport, $currentTransport);
            $currentLocation = $currentTransport->getTo();
        }
        return $sortedTransport;
    }

}