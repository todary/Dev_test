<?php

/**
 * Created by PhpStorm.
 * User: abanob
 * Date: 2/5/2018
 * Time: 8:58 AM
 */

namespace App\Transport;

class DealWithFile
{

    private static $path = '../app/Data/db.json';

    /**
     * @param array $json_data
     */
    public static function save(array $json_data)
    {
        if (!count($json_data)) {
            return;
        }

        $oldData = file_get_contents(self::$path);
        $oldData = json_decode($oldData, true);

        if (is_array($oldData)) {
            $oldData = array_merge($oldData, $json_data);
        } else {
            $oldData = $json_data;
        }

        $txt = json_encode($oldData);

        $myfile = file_put_contents(self::$path, $txt . PHP_EOL);
    }

    /**
     * @return mixed
     */
    public static function getData()
    {
        $oldData = file_get_contents(self::$path);
        return json_decode($oldData, true);

    }
}