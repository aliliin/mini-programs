<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/26
 * Time: 下午3:44
 */

namespace app\api\validate;


class TestValidate extends BaseValidate
{
    protected $rule = [
        //'name' => 'require|max:10',
        'email'=> 'email'
    ];
}