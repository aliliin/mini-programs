<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/28
 * Time: 上午10:13
 */

namespace app\api\model;



class Image extends BaseModel
{
    protected $hidden = ['delete_time','update_time','id','from'];

    public function getUrlAttr($val,$data)
    {
        return $this->prefixImgUrl($val,$data);

    }
}