<?php
/**
 * Created by PhpStorm.
 * User: chenhu
 * Date: 2017/12/25
 * Time: 23:41
 */

namespace Mua;

class Init {

    public static $classMap = array();
    public $assign = [];

    // 框架启动
    static public function run()
    {
        // 引入辅助函数
        include MCORE.'function/common.php';

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

        // 初始化日志库
        \Mua\lib\Log::init();
        $route = new \Mua\classes\Route();
        $ctrl = ucfirst( $route->ctrl ).'Ctrl';
        $ctrlfile = APP.'ctrl/'.ucfirst( $route->ctrl ).'Ctrl.php';
        $action = $route->action;

        // 启动应用控制器
        if(!is_file( $ctrlfile )){
            header('status: 404 Not Found');
            exit;
            //throw new \Exception('Not Find Controller:'.$ctrl);
        }
        include $ctrlfile;
        $ctrlclass = '\\app\\ctrl\\'.$ctrl;
        $ctrlclass = new $ctrlclass();
        if(!method_exists($ctrlclass,$action)) {
            header('status: 404 Not Found');
            exit;
            //throw new \Exception('Not Find Action:'.$action.' Of '.$ctrl);
        }
        $ctrlclass->$action();
    }

    // 核心组件自动加载
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

    // 视图变量分配
    public function assign($param1, $param2 = FALSE)
    {
        if($param2!==FALSE) {
            $this->assign[$param1] = $param2;
        } else if(is_array($param1)) {
            $this->assign = array_merge($this->assign,$param1);
        } else {
            throw new \Exception('Invalid assign data!');
        }
    }

    // 视图渲染
    public function display($dir)
    {
        $viewfile = APP.'views/'.$dir.'.html';
        if(is_file($viewfile)) {
            extract($this->assign);
            include $viewfile;
        } else {
            throw new \Exception('View file does not exist:'.$viewfile);
        }
    }
}