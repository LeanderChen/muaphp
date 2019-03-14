<?php
/**
 * Created by PhpStorm.
 * User: chenhu
 * Date: 2017/12/25
 * Time: 23:07
 */

// 打印调试函数
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

// 生成指定长度掩码
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