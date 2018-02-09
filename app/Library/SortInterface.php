<?php

namespace App\Library;

/**
 * Interface SortInterface
 */
interface  SortInterface
{
    /**
     * @param array $items
     * @return array Transport
     */
    public static function sort(array $items) :array ;

}