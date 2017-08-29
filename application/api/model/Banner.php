<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/26
 * Time: 下午5:44
 */

namespace app\api\model;


class Banner extends BaseModel
{
    //隐藏一些字段用hidden . 展示某些字段用visible函数
    protected $hidden = ['delete_time', 'update_time'];

    //关联关系函数
    public function items()
    {                         // BannerItem关联模型的名字        外键关联.      当前模型Banner 的主键
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    public static function getBannerByID($id)
    {
        //根据关联关系,可以写两个表.
        $banner = self::with(['items', 'items.image'])->find($id);
        return $banner;
    }

}