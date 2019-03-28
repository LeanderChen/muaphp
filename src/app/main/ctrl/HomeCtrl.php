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
        
    }
}