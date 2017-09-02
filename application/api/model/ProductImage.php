<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 下午5:36
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden =  ['delete_time','img_id','product_id'];

    public function imgUrl()
    {
        return $this->belongsTo('Image','img_id','id');
    }
}