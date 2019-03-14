<?php
/**
 * Created by PhpStorm.
 * User: chenhu
 * Date: 2018/3/24
 * Time: 16:39
 */

namespace Mua\lib;


class Model extends \PDO
{
    public function __construct()
    {
        $dbconf = \Mua\lib\Config::get_all('database');
        try{
            parent::__construct($dbconf['dsn'], $dbconf['user'], $dbconf['pwd']);
        } catch(PDOException $e) {
            exit(p($e->getMessage()));
        }
    }
}