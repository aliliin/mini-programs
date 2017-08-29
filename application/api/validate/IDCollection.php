<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/28
 * Time: 下午2:51
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'checkIDs|require'
    ];
    protected $message = [
        'ids' => 'IDs参数必须是以逗号分隔的正整数'
    ];

    protected function checkIDs($value)
    {
        $value = explode(',', $value);
        if (empty($value)) {
            return false;
        }
        foreach ($value as $id) {
            if (!$this->isPostiveInteger($id)) {
                return false;
            }
        }
        return true;
    }
}