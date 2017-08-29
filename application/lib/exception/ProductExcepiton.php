<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/28
 * Time: 下午5:12
 */

namespace app\lib\exception;


class ProductExcepiton extends BaseExcepiton
{
    public $code = 404;
    public  $message = '请求的参数不正确,没找到指定的商品';
    public  $errorCode = 20000;
}