<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 下午4:00
 */

namespace app\api\service;


class Token
{
    //生成token令牌
    public static function generateToken()
    {
        //32个字符组成一组随机字符串
        $randChars = getRandChars(32);
        //加强安全性,进行md5加密
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //SALT 盐
        $salt = 'ahfidDJUAE232DDDAFJD';

        return md5($randChars.$timestamp.$salt);

    }
}