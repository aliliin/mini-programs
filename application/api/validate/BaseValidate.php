<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/26
 * Time: 下午4:48
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        //获取http传入的参数
        //对这些参数进行校验
        //获取全部参数
        $request  = Request::instance();
        $params = $request->param();
        $result = $this->check($params);

        if( !$result){
           $e = new  ParameterException([
               'message' => $this->error,
           ]);
           throw $e;
        }else{
            return true;
        }
    }
    //检查是不是正整数
    protected function isPostiveInteger($value, $rule='',$data='',$field='')
    {
        if(is_numeric($value) && is_int($value + 0 ) && ($value+0) >0){
            return true;
        }else{
            return false;
        }
    }
    //判断防止用户传空值
    public function isNotEmpty($value, $rule='',$data='',$field='')
    {
        if(empty($value)){
            return false;
        }else{
            return true;
        }
    }
}