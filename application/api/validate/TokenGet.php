<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 下午1:18
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
      'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code' => '没有code获取不了Token'
    ];
}