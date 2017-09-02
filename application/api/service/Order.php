<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2017/9/2
 * Time: 上午8:50
 */

namespace app\api\service;


use app\api\model\Product;

class Order
{
    //客户端传递过来的product参数
    protected $oProducts;
    //从数据库查询出来的商品
    protected $products;
    protected $uid;

    //获取订单的状态
    private function getOrderStatus()
    {
        $status = [

        ];
    }

    //下单
    public function place($uid,$oProducts)
    {
        //oProducts 和Products 进行对比
        //先查下数据库中的products数据
        $this->oProducts = $oProducts;
        $this->products = $this->getProductsByOrder($oProduct);
        $this->uid = $uid;
    }
    //根据下单的订单信息查找真实的商品信息
    private function getProductsByOrder($oProducts)
    {
        $oPIDs = [];
        foreach ($oProducts as $oProduct) {
            array_push($oPIDs, $oProduct['product_id']);
        }
        $products = Product::all( $oPIDs)
                    ->visible(['id','price','stock','name','main_img_url'])
                    ->toArray();
        return $products;
    }

}