<?php

namespace mua;

use \mua\classes\Route;
use \mua\lib\Log;
use \Whoops\Run;
use \Whoops\Handler\PrettyPageHandler;

/**
 * @class Init
 * @author leander
 * @version 0.8.0
 *
 * @todo implement initialization of cli & api service
 */
class Init {

    public static $classMap = array();

    /**
     * run web application
     * @access public
     */
    static public function run()
    {
        // 引入composer自动加载
        include ROOT. 'vendor/autoload.php';

        // 注册错误处理器 flip/whoops
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler);
        $whoops->register();

        // 引入辅助函数
        include MCORE. 'function/common.php';

        // TO-DO: [190314] 读取预置、用户配置文件决定启动行为：debug-level、runtime-conf、autoload、log-conf、db driver、cache driver、router...
        // DEBUG模式
        define('DEBUG',true);
        if(DEBUG){
            ini_set('display_errors','On');
        } else {
            ini_set('display_errors','off');
        }

        // TO-DO: [190314-1] 运行时配置，超时时间、上传设置...

        // 注册自动加载
        spl_autoload_register('\Mua\Init::load');

        // 初始化日志
        Log::init();

        // 加载进行路由
        $route = new Route();
        $ctrl = ucfirst( $route->ctrl ).'Ctrl';
        $ctrlfile = APP. $route->mod. '/ctrl/'. ucfirst( $route->ctrl ).'Ctrl.php';
        $action = $route->action;

        // 启动应用控制器
        if(!is_file( $ctrlfile )){
            header('status: 404 Not Found');
            exit;
//            throw new \Exception('Not Find Controller:'.$ctrl);
        }
        include $ctrlfile;
        $ctrlclass = '\\app\\'. $route->mod. '\\ctrl\\'. $ctrl;
        $ctrlclass = new $ctrlclass();
        if(!method_exists($ctrlclass,$action)) {
//            header('status: 404 Not Found');
//            exit;
            throw new \Exception('Not Find Action:'.$action.' Of '.$ctrl);
        }
        $ctrlclass->$action();
    }

    /**
     * auto load mua classes & libraries
     *
     * @access public
     * @param string $class name of class needed
     *
     * @return Object
     */
    static public function load($class)
    {
        if (isset(self::$classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\','/',$class);
            $ifile = ROOT. $class.'.php';
            if(is_file($ifile)) {
                include $ifile;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}