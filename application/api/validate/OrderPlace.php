<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2017/9/1
 * Time: 下午8:30
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate
{
    protected $rule =[
        'products' => 'checkProducts'
    ];
    protected $singRule = [
        'product_id' => 'require|isPositiveInteger',
        'count' => 'require|isPositiveInteger'
    ];

    protected function checkProducts($values)
    {
        if(!is_array($values)){
            throw new ParameterException([
                'message' =>'商品参数不正确.'
            ]);
        }
        if(empty($values)){
            throw new ParameterException([
                'message' =>'商品列表不能为空'
            ]);
        }
        foreach ($values as $value){
                $this->checkProduct($value);
        }
        return true;
    }
    protected function checkProduct($value)
    {
        $validate = new BaseValidate($this->singRule);
        $result = $validate->check($value);
        if(!$result){
            throw new ParameterException([
                'message' =>'商品列表参数不正确'
            ]);
        }
    }
}