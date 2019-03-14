<?php
/**
 * Created by PhpStorm.
 * User: chenhu
 * Date: 2017/12/25
 * Time: 22:25
 *
 * 1. 初始目录
 * 2. 启动MU
 */

//程序根目录
define('ROOT',str_replace('\\','/',realpath(dirname(dirname(__FILE__)).'/'))."/");

//框架核心目录
define('MCORE',ROOT.'Mua/');

//应用模块目录
define('APP',ROOT.'app/');

//引入框架中枢
include MCORE.'Init.php';

//启动框架
\Mua\Init::run();