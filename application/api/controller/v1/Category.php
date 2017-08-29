<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/29
 * Time: 上午11:57
 */

namespace app\api\controller\v1;


use app\lib\exception\CategoryException;

class Category
{
    public function getAllCategories()
    {
        $categories = \app\api\model\Category::all([],'img');
        if(!$categories){
            throw new CategoryException();
        }
        return $categories;
    }
}