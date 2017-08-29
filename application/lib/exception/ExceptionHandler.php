<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/26
 * Time: 下午6:33
 */

namespace app\lib\exception;

use Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    public  $code; //http 状态吗
    public  $message; //错误的具体信息
    public  $errorCode;//自定义返回的状态码

    public function render(Exception $e)
    {
       if($e instanceof BaseExcepiton){
           //如果是自定义的异常错误
           $this->code = $e->code;
           $this->errorCode = $e->errorCode;
           $this->message = $e->message;

       }else{
           if(config('app_debug')){
               return parent::render($e);
           }else{
               $this->code = 500;
               $this->errorCode = 999;
               $this->message = '具体错误信息不想告诉你^_^';
               $this->recordErrorLog($e);
           }

       }
       //为了获取当前访问的url
        $request = Request::instance();
        $result = [
            'message' => $this->message,
            'errorCode'=> $this->errorCode,
            'request_url'=>  $request->url()
        ];
        return json($result,$this->code);
    }
    //自定义错误级别 写入日志
    private function recordErrorLog(Exception $e)
    {
        Log::info([
            'type' =>'File',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);
        Log::record($e->getMessage(),'error');
    }
}