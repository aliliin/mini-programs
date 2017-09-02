<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 下午1:26
 */

namespace app\api\model;


class User extends BaseModel
{
<<<<<<< HEAD
    //关联关系.一对一. 一位用户可以拥有多个不同地址.
    public function address()
    {
        return $this->hasOne('UserAddress','user_id','id');
=======
    //关联关系.一对多. 一位用户可以拥有多个不同地址.
    public function address()
    {
        return $this->hasMany('UserAddress','user_id','id');
>>>>>>> d7378c720ca05b0c5a57f4882e0d6c5f734868b1
    }

    public static function getByOpenID($openid)
    {
        $user = self::where('openid','=',$openid)->find();
        return $user;
    }

}