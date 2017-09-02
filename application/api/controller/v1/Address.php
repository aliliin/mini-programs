<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/30
 * Time: 上午9:02
 */

namespace app\api\controller\v1;

use app\api\model\User;
use app\api\service\Token as TokenService;
use app\api\validate\AddressNew;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;


class Address extends BaseController
{
    //基类Controller有一个成员变量
    // 这个属性的意思是,在执行一个方法之前必须要执行什么方法.
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createOrUpdateAddress']
    ];

    //创建或者更新地址..
    public function createOrUpdateAddress()
    {
        $validate = new AddressNew();
        $validate->goCheck();
        //根据token获取用户的uid
        //根据uid来查找用户数据,判断用户是否存在,如果不存在抛出异常.
        //用户存在,获取用户从客户端提交来的信息.
        //根据用户地址信息是否存在 从而判断,是添加地址还是更新地址
        $uid =  TokenService::getCurrentUid();
        $user = User::get($uid);
        if(!$user){
            throw new UserException();
        }
        //获取用户从客户端传来的数据数组
        $dataArray = $validate->getDataByRule(input('post.'));

        $userAddress = $user->address;
        if(!$userAddress){
            $user->address()->save($dataArray);
        }else{
            $user->address->save($dataArray);
        }
       // return $user;
        return json(new SuccessMessage(),201);
    }
}