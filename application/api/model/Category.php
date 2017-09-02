<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 上午11:58
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
    public function img()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }
}