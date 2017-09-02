<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 下午4:00
 */

namespace app\api\service;


<<<<<<< HEAD
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
=======
>>>>>>> d7378c720ca05b0c5a57f4882e0d6c5f734868b1
use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

class Token
{
    //生成token令牌
    public static function generateToken()
    {
        //32个字符组成一组随机字符串
        $randChars = getRandChars(32);
        //加强安全性,进行md5加密
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //SALT 盐
        $salt = 'ahfidDJUAE232DDDAFJD';

        return md5($randChars.$timestamp.$salt);
    }
    //写个通用的方法,来获取用户的各种信息.
    public static function getCurrentTokenVar($key)
    {
        //t通过header 获取
        $token = Request::instance()->header('token');
        $vars = Cache::get($token);

        if(!$vars){
            throw new TokenException();
        }else{

            if(!is_array($vars)){
                $vars = json_decode($vars,true);
            }

            if(array_key_exists($key,$vars)){
                return $vars[$key];
            }else{
                throw new Exception('尝试获取的Token变量并不存在');
            }
        }
    }
    public static function getCurrentUid()
    {
        //token令牌
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }
<<<<<<< HEAD

    //用户需要权限的验证 用户跟管理员都可以访问的接口
    public static function needPrimaryScope()
    {
        $scope = self::getCurrentTokenVar('scope');
        if($scope){
            if($scope >= ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }

    //只有用户可以访问的权限接口
    public static function needExclusiveScope()
    {
        $scope = self::getCurrentTokenVar('scope');
        if($scope){
            if($scope == ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }



=======
>>>>>>> d7378c720ca05b0c5a57f4882e0d6c5f734868b1
}