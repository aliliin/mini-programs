<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/30
 * Time: 上午9:05
 */

namespace app\api\validate;


class AddressNew  extends BaseValidate
{
    //地址验证器
    protected $rule =[
            'name' => 'require|isNotEmpty',
            'mobile'=> 'require|isMobile',
            'province'=> 'require|isNotEmpty',
            'city'=> 'require|isNotEmpty',
            'country'=> 'require|isNotEmpty',
            'detail'=> 'require|isNotEmpty'
    ];
}