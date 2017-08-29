<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/26
 * Time: 下午6:41
 */

namespace app\lib\exception;


class BannerMissException extends BaseExcepiton
{
    public $code = 404;
    public  $message = '请求的Banner不存在';
    public  $errorCode = 40000;
}