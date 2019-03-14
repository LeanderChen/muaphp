<?php

namespace mua\classes;

/**
 * @class Config
 * @author leander
 * @package \mua\classes
 * @version 0.8.0
 */
class Config
{
    static $conf;

    /**
     * @param string $name  配置项名称
     * @param string $cfg   配置文件名/类目名
     * @param string $mod   默认base模块
     * @param bool $cache   默认使用缓存
     *
     * @return 指定模块配置类目下配置项的值
     * @throws \Exception
     *
     * @todo cached
     */
    static public function get($name, $cfg, $mod = 'base', $cache = true)
    {
        if(isset(self::$conf[$cfg][$name]) && $cache) {
            return self::$conf[$cfg][$name];
        }
        $cfgfile = APP. $mod. '/conf/'.$cfg.'.php';
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
     * @param string $cfg   配置文件名/类目名
     * @param string $mod   默认base模块
     * @param bool $cache   默认使用缓存
     *
     * @return 指定模块配置类目下所有配置
     * @throws \Exception
     *
     * @todo cached
     */
    static public function get_all($cfg, $mod = 'base', $cache = true)
    {
        if(isset(self::$conf[$cfg]) && $cache) {
            return self::$conf[$cfg];
        }
        $cfgfile = APP. $mod. '/conf/'. $cfg. '.php';
        if(is_file($cfgfile)) {
            $config = include $cfgfile;
            self::$conf[$cfg] = $config;
            return $config;
        } else {
            throw new \Exception('Conf file does not exist:'.$cfg);
        }
    }
}