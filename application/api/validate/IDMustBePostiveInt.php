<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/26
 * Time: 下午4:11
 */

namespace app\api\validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id'=> 'isPostiveInteger|require',
    ];

    protected $message = [
        'id' => 'IDs参数必须是正整数'
    ];
}