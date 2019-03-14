<?php

namespace app\main\ctrl;

use \mua\classes\Ctrl;
use \mua\lib\Log;

class HomeCtrl extends Ctrl
{
    public function index()
    {
//        echo 'I\'m home_index,the default home controller action';
        $data = array(
            'msg' => 'I\'m first view of mua!'
        );
        $this->assign($data);
        $this->assign('title','测试视图');
        $this->render('home/index');
        Log::log('test');
    }

    public function db_test()
    {
        $model = new \mua\lib\Model();
        $sql = 'SELECT * FROM ifm_user';
        $ret = $model->query($sql);
        p($ret->fetchAll());

        // 初始化超级管理员
        $salt = mask_make(12);
        $password = 'mua';
        $password = md5(md5($password.$salt).$salt);
        $time = time();
        $sql = "UPDATE ifm_user SET password='{$password}',salt='{$salt}',createtime={$time} WHERE uid=1";
        $ret = $model->exec($sql);
        p($ret);
    }
}