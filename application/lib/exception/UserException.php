<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/30
 * Time: 上午9:51
 */

namespace app\lib\exception;


class UserException extends BaseExcepiton
{
    public $code = 404;
    public  $message = '当前用户不存在';
    public  $errorCode = 60000;
}