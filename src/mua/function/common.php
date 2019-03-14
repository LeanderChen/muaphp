<?php

/**
 * c info about client
 *
 * @param string $key   key of client info
 *
 * @return mixed
 */
function c($key = 'all')
{
    return [];
}

/**
 * h catch data with http
 *
 * @param string $url       target url
 * @param array $param      data carried with request
 * @param string $method    request method
 * @param array $header     request header
 *
 * @return mixed
 */
function h($url, $param = [], $method = 'get', $header = [])
{
    return [];
}

/**
 * i get Input params
 *
 * @param string $key   key of input params
 *
 * @return mixed
 */
function i($key)
{
    $key = strtolower($key);
    if (substr($key, 0, 3) === 'get') {
        $key = substr($key, 4);
        return isset($_GET[$key])? $_GET[$key]: null;
    }
    else if (strtolower(substr($key, 0, 4)) === 'post') {
        $key = substr($key, 5);
        return isset($_POST[$key])? $_POST[$key]: null;
    }
    else
    {
        $i = array_merge($_GET, $_POST);
        return sizeof($i)? $i: null;
    }

}

/**
 * l log info by system log method
 *
 * @require mua
 *
 * @param mixed $info   info needed log
 * @param string $type  log type
 *
 */
function l($info, $type = 'debug')
{

}

/**
 * p print friendly debug info
 *
 * @param mixed $var    debug info
 */
function p($var)
{
    if(is_bool($var)) {
        var_dump($var);
    } elseif (is_null($var)) {
        var_dump(NULL);
    } else {
        echo '<pre style="position:relative;z-index:1000;padding:10px;border-radius:5px;background:ghostwhite;border:1px solid #AAA;fontsize:14px;line-height:18px;opacity:0.9">'.
            print_r($var,TRUE).
            '</pre>';
    }
}

/**
 * r get Route instance
 *
 * @name r
 *
 * @return object
 */
function r()
{
    return new \mua\classes\Route();
}

/**
 * s info about server
 *
 * @param string $key   key of server info
 *
 * @return mixed
 */
function s($key = 'all')
{
    return [];
}

/**
 * w write data at server side
 *
 * @param string $text
 */
function w($text, $path)
{

}

/**
 * mask_make used to generate rand string with specified length
 *
 * @param int $length   string length
 *
 * @return string
 */
function mask_make( $length = 8 )
{
    // 密码字符集，可任意添加你需要的字符
    $chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',
    't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D',
    'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O',
    'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!',
    '@','#', '$', '%', '^', '&', '*', '(', ')', '-', '_',
    '[', ']', '{', '}', '<', '>', '~', '`', '+', '=', ',',
    '.', ';', ':', '/', '?', '|');

    // 在 $chars 中随机取 $length 个数组元素键名
    $keys = array_rand($chars,$length);
    $password = '';
    for($i = 0; $i < $length; $i++)
    {
    // 将 $length 个数组元素连接成字符串
    $password .= $chars[$keys[$i]];
    }
    return $password;
}