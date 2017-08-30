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

    public function imgs()
    {
        return $this->hasMany('ProductImage','product_id','id');
    }
    public function properties()
    {
        return $this->hasMany('ProductProperty','product_id','id');
    }
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
    public static  function getProductDetail($id)
    {
        //$product = self::with(['imgs.imgUrl','properties'])->find($id);
        //为了解决商品详情中国图片排序的问题.
        $product = self::with([
            'imgs' => function($query){
                $query->with(['imgUrl'])
                    ->order('order','asc');
            }
        ])->with(['properties'])->find($id);
        return $product;

    }
}