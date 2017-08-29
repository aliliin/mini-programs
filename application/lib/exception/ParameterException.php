<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/27
 * Time: 上午11:08
 */

namespace app\lib\exception;


class ParameterException extends BaseExcepiton
{
    public  $code = 400; //http 状态吗
    public  $message = 'Parameter error'; //错误的具体信息
    public  $errorCode = 10000;//自定义返回的状态码

}