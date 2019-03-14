<?php

namespace mua\classes;

use \mua\classes\Config;

/**
 * @class Route
 * @author leander
 * @version 0.8.0
 */
class Route {

    public $mod = '';
    public $ctrl = '';
    public $action = '';

    /**
     * constructor
     */
    public function __construct()
    {
        $routeconf = Config::get_all('route');
        $routestr = trim(explode('?', $_SERVER['REQUEST_URI'])[0], '\/');
        $routestr = str_replace(array_merge([], $routeconf['rewrite_extension']), '', $routestr);
        $uriarr = explode('/', $routestr);

        // 构造路由变量：MOD、CTRL、ACT
        if(sizeof($uriarr) > 2) {
            // 指定模块访问： mod/ctrl/action?a=b
            $this->mod = $uriarr[0];
            $this->ctrl = $uriarr[1]?$uriarr[1]:$routeconf['CTRL'];
            $this->action = $uriarr[2]?$uriarr[2]:$routeconf['ACT'];
        } else if(sizeof($uriarr) == 2) {
            // 默认模块访问：ctrl/action?a=b
            $this->ctrl = $uriarr[0]?$uriarr[0]:$routeconf['CTRL'];
            $this->action = $uriarr[1]?$uriarr[1]:$routeconf['ACT'];
        } else {
            // 站点首页访问，或
            // 模块首页访问： mod?a=b
            $this->mod = $uriarr[0]?$uriarr[0]:$routeconf['MOD'];
            $this->ctrl = $routeconf['CTRL'];
            $this->action = $routeconf['ACT'];
        }

        // 构造路由查询：/key/value
        $i = 2;
        $count = count($uriarr);
        while ($i < $count) {
            if(!isset($uriarr[$i+1])) break;
            $_GET[$uriarr[$i]] = urldecode($uriarr[$i+1]);
            $i = $i+2;
        }
    }
}