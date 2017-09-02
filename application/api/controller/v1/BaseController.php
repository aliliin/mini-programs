<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2017/9/1
 * Time: 下午8:17
 */

namespace app\api\controller\v1;


use think\Controller;

class BaseController extends Controller
{
    //验证初级权限的作用域
    protected function checkPrimaryScope(){
        \app\api\service\Token::needPrimaryScope();
    }

    protected function checkExclusiveScope()
    {
        \app\api\service\Token::needExclusiveScope();
    }
}