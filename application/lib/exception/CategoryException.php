<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 下午12:06
 */

namespace app\lib\exception;


class CategoryException extends BaseExcepiton
{
    public  $code = 404; //http 状态吗
    public  $message = '指定的类目不存在,请检查参数'; //错误的具体信息
    public  $errorCode = 50000;//自定义返回的状态码
}