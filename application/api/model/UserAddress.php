<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/30
 * Time: 上午9:12
 */

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden=['id','delete_time','user_id'];
}