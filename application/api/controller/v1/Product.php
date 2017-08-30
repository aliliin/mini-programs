<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/28
 * Time: 下午4:53
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ProductExcepiton;

class Product
{
    //获取最新商品
    public function getRecent($count = 15)
    {
        (new Count())->goCheck();

        $products = ProductModel::getMostRecent($count);
        if(!$products){
            throw new ProductExcepiton();
        }
        //临时隐藏这次你不需要的字段,但是不影响你以后使用
        //先把它变成数据集
        $collection = collection($products);
        $products = $collection->hidden(['summary']);
        return $products;
    }
    //分类下的具体商品
    public function getAllInCategory($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $products = ProductModel::getProductsByCategoryID($id);
        if (!$products){
            throw new ProductExcepiton();
        }
        $collection = collection($products);
        $products = $collection->hidden(['summary']);
        return $products;
    }
    //获取具体商品详情信息
    public function getOne($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);
        if(!$product){
            throw new ProductExcepiton();
        }
        return $product;

    }
}