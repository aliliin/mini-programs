<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 下午1:27
 */

namespace app\api\service;


use app\api\model\User;
<<<<<<< HEAD
use app\lib\enum\ScopeEnum;
=======
>>>>>>> d7378c720ca05b0c5a57f4882e0d6c5f734868b1
use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;


class UserToken extends Token
{
    protected $code;
    protected $AppID;
    protected $AppSecret;
    protected $LoginUrl;

    public function __construct($code)
    {

        $this->code = $code;
        $this->AppID = 'wxa91d3d14e15af1ee';
        $this->AppSecret = config('WX.secret');
        $this->LoginUrl = sprintf(config('WX.login_url'), $this->AppID, $this->AppSecret, $this->code);

    }
    public function get()
    {
        $result = curl_get($this->LoginUrl);
        $wxResult = json_decode($result,true);
        if(empty($wxResult)){
            throw new Exception('获取session_key或open_ID 时异常,微信内部错误');
        }else{
             $loginFail = array_key_exists('errcode', $wxResult);
             if($loginFail){
                return $this->processLoginError($wxResult);
             }else{
                return  $this->grantToken($wxResult);
             }
        }

    }
    private function processLoginError($wxResult)
    {
        throw new  WeChatException([
            'message' => $wxResult['errmsg'],
            'errorCode'=>$wxResult['errcode']
        ]);
    }

    private function grantToken($wxResult)
    {
        //拿到open_id
        //数据库中看一下这个open_id是不是存在,
        //如果存在不处理,不存在就要处理.
        //生成令牌 .准备缓存数据,写入缓存
        //把令牌返回到客户端.
        //缓存key就是用户携带的令牌,用户拿到的令牌取回来的信息
        //value : wxResult,uid, scope权限
        $openid = $wxResult['openid'];
        $user = User::getByOpenID($openid);
        if($user){
            $uid = $user->id;
        }else{
            $uid = $this->newUser($openid);
        }
        $cachedValue = $this->prepareCachedValue($wxResult,$uid);
<<<<<<< HEAD

=======
>>>>>>> d7378c720ca05b0c5a57f4882e0d6c5f734868b1
        $token = $this->saveToCached($cachedValue);
        return $token;
    }
    //写入缓存
<<<<<<< HEAD
    private function saveToCached($wxResult)
    {
        $key = self::generateToken();
        $value = json_encode($wxResult);
        $expire_id = config('setting.token_expire_in');

        //用tp5自带的写入缓存的函数. cache(key,value,过期时间); 默认使用的是文件的缓存存入系统
=======
    private function saveToCached($cachedValue)
    {
        $key = self::generateToken();
        $value = json_encode($cachedValue);
        $expire_id = config('setting.token_expire_in');

        //用tp5知道的写入缓存的函数. cache(key,value,过期时间); 默认使用的是文件的缓存存入系统
>>>>>>> d7378c720ca05b0c5a57f4882e0d6c5f734868b1
        $request = cache($key,$value,$expire_id);
        if(!$request){
            throw new TokenException([
                'message' => '微信服务器异常',
                'errorCode'=> 10015
            ]);
        }
        return $key;
    }
    //生成缓存的数据 value
    private function prepareCachedValue($wxResult,$uid)
    {
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
<<<<<<< HEAD
        //User (16)代表app用户的权限数值 这里使用了枚举类型
        //Super(32) 代表CMS(管理员)用户的权限数值
        $cachedValue['scope'] = ScopeEnum::User; //作用域 可以用来做分组

        return $cachedValue;
=======
        $cachedValue['scope'] = 16;
>>>>>>> d7378c720ca05b0c5a57f4882e0d6c5f734868b1
    }
    //插入用户
    private function newUser($openid){
        $user = User::create([
            'openid'=>$openid,
        ]);
        return $user->id;
    }
}