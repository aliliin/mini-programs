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
    //判断用户传入的数据 规则
    public function getDataByRule($arrays)
    {
        if(array_key_exists('user_id',$arrays)|array_key_exists('uid',$arrays)){
            throw new ParameterException([
                'message' => '参数中包含有非法字符,参数名user_id,或者uid'
            ]);
        }
        $newArray = [];
        foreach ($this->rule as $key => $value) {
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }
    //自定义验证规则手机号
    public function isMobile($value)
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule,$value);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}