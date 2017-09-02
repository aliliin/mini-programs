<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/27
 * Time: 下午5:44
 */

namespace app\api\model;


class BannerItem extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time', 'banner_id', 'img_id'];

    public function image()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }

}