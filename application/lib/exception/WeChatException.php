<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 下午2:07
 */

namespace app\lib\exception;


class WeChatException extends BaseExcepiton
{
    public $code = 404;
    public  $message = '微信服务接口调用失败';
    public  $errorCode = 99999;
}