<?php
namespace mua\classes;

use \mua\lib\Config;
use \Medoo\Medoo;

/**
 * @class Model
 * @author leander
 * @version 0.8.0
 */
class Model extends Medoo
{
    private $mconf;
    /**
     * @pro
     */
    protected $obj;

    /**
     * constructor
     * @access public
     * @param string $obj 对象名
     */
    public function __construct(string $obj = '')
    {
        $conf = Config::get_all('database');
        $this->mconf = [
            // [required]
            'database_type' => $conf['db_type'],
            'database_name' => $conf['db_name'],
            'server' => $conf['db_server'],
            'username' => $conf['db_name'],
            'password' => $conf['db_pwd'],

            // [optional]
            'charset' => $conf['db_charset'] ?: 'utf8mb4',
            'collation' => $conf['db_collation'] ?: 'utf8mb4_general_ci',
            'port' => $conf['db_port'] ?: 3306,
            'prefix' => $conf['db_prefix'] ?: '',

            // [advanced]
            'logging' => $conf['logging'] ?: false,
            'socket' => $conf['socket'] ?: '/tmp/mysql.sock',
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ],
            'command' => [
                'SET SQL_MODE=ANSI_QUOTES'
            ]
        ];
        parent::__construct($this->mconf);

        $obj && $this->obj = $obj;
    }

    /**
     * get, query main table records by rewrite /Medoo/Medoo::get()
     * @access protected
     * @name get
     * @param array
     *
     * @return array
     */
    protected function get(array $_where, array $cols) : array
    {
        return parent::get($this->obj, $cols, $_where);
    }

    /**
     * update
     * @access protected
     * @name upd
     * @param array $_data  new data
     * @param array $_where where clause
     *
     */
    protected function upd(array $_data, array $_where = [])
    {
        $this->update($this->obj, $_data, $_where);
    }

    protected function del($_where)
    {
        $this->delete($this->obj, $_where);
    }

    protected function add($_data)
    {
        $this->insert($this->obj, $_data);
    }
}
