<?php
/**
 * Created by PhpStorm.
 * User: chenhu
 * Date: 2018/3/28
 * Time: 23:27
 */

namespace Mua\classes;


class Config
{
    static $conf;
    /**
     * @param $name 配置项名称
     * @param $cfg  配置文件名/类目名
     *
     * @return 指定配置类目下配置项的值
     */
    static public function get($name, $cfg, $cache = true)
    {
        if(isset(self::$conf[$cfg][$name]) && $cache) {
            return self::$conf[$cfg][$name];
        }
        $cfgfile = APP.'conf/'.$cfg.'.php';
        if(is_file($cfgfile)) {
            $config = include $cfgfile;
            if(isset($config[$name])) {
                self::$conf[$cfg] = $config;
                return $config[$name];
            } else {
                throw new \Exception('Conf item does not exist:'.$name.' of '.$cfg);
            }
        } else {
            throw new \Exception('Conf file does not exist:'.$cfg);
        }
    }

    /**
     * @param $cfg  配置文件名/类目名
     *
     * @return 指定配置类目下所有配置
     */
    static public function get_all($cfg, $cache = true)
    {
        if(isset(self::$conf[$cfg]) && $cache) {
            return self::$conf[$cfg];
        }
        $cfgfile = APP.'conf/'.$cfg.'.php';
        if(is_file($cfgfile)) {
            $config = include $cfgfile;
            self::$conf[$cfg] = $config;
            return $config;
        } else {
            throw new \Exception('Conf file does not exist:'.$cfg);
        }
    }
}