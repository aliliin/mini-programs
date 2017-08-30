<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 下午5:37
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden =  ['delete_time','id','product_id','update_time'];

}