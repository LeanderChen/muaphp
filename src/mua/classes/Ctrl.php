<?php

namespace mua\classes;

/**
 * @class Ctrl
 * @author leander
 * @version 0.8.0
 */
class Ctrl {

    public $route;
    private $assign = [];

    /**
     * constructor
     */
    public function __construct()
    {
        $this->route = r();
    }

    /**
     * assign variable to target views
     *
     * @param mixed $param1 map array or key of variable
     * @param mixed $param2 value of variable
     *
     * @throws \Exception
     */
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

    /**
     * render target views
     *
     * @param string $dir   name of view
     *
     * @throws \Exception
     */
    public function render($dir)
    {
        $viewfile = APP. $this->route->mod. '/views/'.$dir.'.html';
        if(is_file($viewfile)) {
            extract($this->assign);
            include $viewfile;
        } else {
            throw new \Exception('View file does not exist:'.$viewfile);
        }
    }
}