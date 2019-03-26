<?php

//程序根目录
define('ROOT', str_replace('\\', '/', realpath(dirname(dirname(__FILE__)). '/')). "/");

//框架核心目录
define('MCORE', ROOT. 'mua/');

//应用模块目录
define('APP', ROOT. 'app/');

//应用数据目录
define('DATA', ROOT. 'data/');

//引入框架中枢
include MCORE.'Init.php';

//启动框架
\mua\Init::run();
