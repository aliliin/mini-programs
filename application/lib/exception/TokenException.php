<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 下午4:24
 */

namespace app\lib\exception;


class TokenException extends BaseExcepiton
{
    public $code = 401;
    public  $message = '微信Token无效或已经过期';
    public  $errorCode = 10011;
}