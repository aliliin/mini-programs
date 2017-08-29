<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/28
 * Time: 下午4:56
 */

namespace app\api\validate;



class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPostiveInteger|between:1,15'
    ];
}