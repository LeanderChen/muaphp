<?php

namespace app\main\ctrl;

use \app\base\ctrl\BaseCtrl;
use \mua\lib\Log;

class HomeCtrl extends BaseCtrl
{
    public function index()
    {
        $data = [
            'msgs' => [
                'I\'m first view of mua!',
                'Mua is a php framework for application or business system assembing instantly.',
                'All is here.'
            ]
        ];
        $this->assign($data);
        $this->assign('title','Greetings from MUA');
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