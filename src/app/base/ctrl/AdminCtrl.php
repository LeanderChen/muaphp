<?php
namespace app\base\ctrl;

use app\base\ctrl\BaseCtrl;

class AdminCtrl extends BaseCtrl
{
    /**
     * __construct, initialize orm model
     * @access public
     */
    public function __construct()
    {
        parent::__construct('admin');
    }

    /**
     * auth_check, check operation auth is success, or not.
     * @access auth_check
     *
     * @param int $aid      adminid
     * @param string $path  operation path
     *
     * @return bool         auth check result
     */
    public function auth_check(int $aid, string $path) : bool
    {
        return true;
    }

    /**
     * auth_update, update auth setting of admin
     * @access public
     *
     * @param int $aid      adminid
     * @param array $auth   admin auth setting
     */
    public function auth_update(int $aid, array $auth)
    {

    }
}