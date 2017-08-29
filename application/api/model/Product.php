<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/28
 * Time: 下午2:32
 */

namespace app\api\model;


//
class Product extends BaseModel
{
    protected $hidden =  ['delete_time','update_time','pivot','create_time','category_id','from'];

    public function getMainImgUrlAttr($val,$data)
    {
        return $this->prefixImgUrl($val,$data);
    }

    //
    public static function getMostRecent($count)
    {
        $products = self::limit($count)->order('create_time desc')->select();
        return $products;
    }
    //查询具体分类下的商品
    public static function getProductsByCategoryID($categoryID)
    {
        $products = self::where('category_id','=',$categoryID)->select();
        return $products;
    }
    //查询具体某个商品的详情
    public function getProductDetail($id)
    {

    }
}