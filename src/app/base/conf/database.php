<?php
/**
 * Created by PhpStorm.
 * User: chenhu
 * Date: 2018/3/28
 * Time: 23:20
 */

return [
    'db_type' => 'mysql',
    'db_name' => 'mua',
    'db_server' => '127.0.0.1',
    'db_port' => '3306',
    'db_user' => 'mua',
    'db_pwd' => 'mua',

    // optional
    'db_charset' => '',     // default for utf8mb4
    'db_collation' => '',   // default for utf8mb4_general_ci
    'db_prefix' => '',      // default for none prefix

    // advanced
    'logging' => true,      // default for false for better performance
    'socket' => '',         // default for '/tmp/mysql.sock'(shouldn't be used with server and port)
];
