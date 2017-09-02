<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/28
 * Time: 下午3:38
 */

namespace app\lib\exception;


class ThemeException extends BaseExcepiton
{
    public $code = 404;
    public  $message = '请求的指定主题不存在';
    public  $errorCode = 30000;
}