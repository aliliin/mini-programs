<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/26
 * Time: 下午6:36
 */
// 异常处理类 不返回给客户端的
namespace app\lib\exception;


use think\Exception;
use Throwable;

class BaseExcepiton extends Exception
{

    public  $code = 400; //http 状态吗
    public  $message = 'Parameter error'; //错误的具体信息
    public  $errorCode = 10000;//自定义返回的状态码

    public function __construct($params = [])
    {
        if(!is_array($params)){
            return ;
        }
        if(array_key_exists('code',$params)){
            $this->code = $params['code'];
        }
        if(array_key_exists('message',$params)){
            $this->message = $params['message'];
        }
        if(array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
    }

}