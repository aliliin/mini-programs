<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/30
 * Time: 上午10:16
 */

namespace app\lib\exception;


class SuccessMessage extends BaseExcepiton
{
    public $code = 201;
    public  $message = 'Success';
    public  $errorCode = 0000;
}