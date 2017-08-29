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
    public static function getByOpenID($openid)
    {
        $user = self::where('openid','=',$openid)->find();
        return $user;
    }
}