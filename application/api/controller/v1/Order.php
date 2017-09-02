<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2017/9/1
 * Time: 下午7:33
 */

namespace app\api\controller\v1;


use app\api\validate\OrderPlace;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Controller;
use \app\api\service\Token as TokenSerice;
//订单方法
class Order extends BaseController
{

    //基类Controller有一个成员变量
    // 这个属性的意思是,在执行一个方法之前必须要执行什么方法.
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder']
    ];

    //用户在选择商品后,向api提交包含他所选择的商品的相关信息.
    // API 在接到信息后需要检查相关订单的库存量.
    //有库存,把订单数据存入数据库中,下单成功了返回客户端消息,可以支付了.
    //之后就要调用支付接口,进行支付.
    //还需要再次进行库存量检查.
    //服务器这边就可以调用微信支付接口进行支付
    //微信会返回给我们一个支付的结果(异步调用),我们需要微信返回的结果,才能判断用户是否购买.
    //即使支付成功了.也要进行库存量的检查
    //数据库的库存量才能减少.支付失败,不减少库存,返回失败结果

    //下单接口, 管理员没有权限调用用户下单的接口
    public function placeOrder()
    {
        (new OrderPlace())->goCheck();
        $products = input('post.products/a');
        $uid = \app\api\service\Token::getCurrentUid();

    }

}