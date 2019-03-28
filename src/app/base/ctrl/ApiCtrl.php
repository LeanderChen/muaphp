<?php
namespace \app\base\ctrl;

use \mua\classes\Ctrl;

/**
 * @name ApiCtrl, trait implemented with restful api features
 * @author leander
 * @version 0.8.0
 */
trait ApiCtrl {

    private $header = '';
    private $content_type = 'application/json';

    protected function show_ret($code, $data = [])
    {

    }

    protected function ok_ret($data)
    {
        $this->show_ret(200, $data);
    }

    protected function noauth_ret()
    {
        $this->show_ret(403);
    }
}