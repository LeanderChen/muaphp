<?php

namespace mua\lib;

/**
 * @class Model
 * @author leander
 * @version 0.8.0
 */
class Model extends \PDO
{
    /**
     * constructor
     */
    public function __construct()
    {
        $dbconf = \mua\lib\Config::get_all('database');
        try{
            parent::__construct($dbconf['dsn'], $dbconf['user'], $dbconf['pwd']);
        } catch(PDOException $e) {
            exit(p($e->getMessage()));
        }
    }
}