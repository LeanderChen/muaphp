<?php
/**
 * Created by PhpStorm.
 * User: chenhu
 * Date: 2018/3/29
 * Time: 23:32
 */

namespace Mua\lib;

class Log
{
    static $class;

    static public function init()
    {
        $driver = \Mua\classes\Config::get('DRIVER', 'log');
        $class = '\Mua\lib\driver\log\\'.$driver;
        self::$class = new $class();
    }

    static public function log($msg)
    {
        self::$class->log($msg);
    }
}