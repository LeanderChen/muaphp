<?php
/**
 * Created by PhpStorm.
 * User: chenhu
 * Date: 2017/12/26
 * Time: 23:47
 */

namespace Mua\classes;

class Route {

    public $ctrl = '';
    public $action = '';

    public function __construct()
    {
        $routeconf = \Mua\classes\Config::get_all('route');
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/') {
            $uriarr = explode('/',trim($_SERVER['REQUEST_URI'],'/'));
            $this->ctrl = isset($uriarr[0])?$uriarr[0]:$routeconf['CTRL'];
            $this->action = isset($uriarr[1])?$uriarr[1]:$routeconf['ACT'];

            $i = 2;
            $count = count($uriarr);
            while ($i < $count) {
                if(!isset($uriarr[$i+1])) break;
                $_GET[$uriarr[$i]] = urldecode($uriarr[$i+1]);
                $i = $i+2;
            }
        } else {
            $this->ctrl = $routeconf['CTRL'];
            $this->action = $routeconf['ACT'];
        }
    }
}