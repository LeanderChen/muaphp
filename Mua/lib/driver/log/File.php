<?php
/**
 * Created by PhpStorm.
 * User: chenhu
 * Date: 2018/3/29
 * Time: 21:57
 */

namespace Mua\lib\driver\log;
class File
{
    public $path;   #日志存储目录
    public function __construct()
    {
        $config = \Mua\classes\Config::get('OPTION', 'log');
        $this->path = ROOT.$config['FILE']['path'];
        // exit(p($this->path.'system'.'.log'));
    }

    public function log($msg, $file = 'system')
    {
        is_dir($this->path) OR mkdir($this->path, 0777, true);
        $msg = (is_array($msg) OR is_object($msg))? json_encode($msg):$msg;
        $msg = '# '.date('Y-m-d H:i:s').' '.$msg.PHP_EOL;
        return file_put_contents($this->path.$file.'.log', $msg, FILE_APPEND);
    }
}