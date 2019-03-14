<?php

namespace mua\lib;

/**
 * @class Log
 * @author leander
 * @package \mua\lib
 * @version 0.8.0
 */
class Log
{
    static $class;

    /**
     * @return none, but init/load Log
     */
    static public function init()
    {
        $driver = \mua\classes\Config::get('DRIVER', 'log');
        $class = '\mua\lib\driver\log\\'.$driver;
        self::$class = new $class();
    }

    /**
     * @param string $msg
     *
     * @return none, but write log
     */
    static public function log($msg)
    {
        self::$class->log($msg);
    }
}