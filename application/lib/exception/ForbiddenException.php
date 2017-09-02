<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2017/9/1
 * Time: 下午7:13
 */

namespace app\lib\exception;


class ForbiddenException extends BaseExcepiton
{
    public  $code = 403; //http 状态吗
    public  $message = '您当前的权限不够'; //错误的具体信息
    public  $errorCode = 10001;//自定义返回的状态码
}