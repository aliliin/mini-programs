<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/28
 * Time: 下午2:34
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden =  ['delete_time','update_time',
                        'head_img_id','topic_img_id',
                        'id','from',];
    //关联Image表.一对一关系模型
    public function topicImg()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }

    public function headImg()
    {
        return $this->belongsTo('Image','head_img_id','id');
    }
    //定义多对多的关系
    public function products()
    {                               //那个表的关联          中间件定义表关系的表
        return $this->belongsToMany('Product','theme_product',
                                'product_id', 'theme_id');
    }

    public static function getThemeWithProducts($id)
    {
        $theme = self::with('products,topicImg,headImg')->find($id);
        return $theme;
    }
}