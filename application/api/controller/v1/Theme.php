<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/28
 * Time: 下午2:29
 */

namespace app\api\controller\v1;


use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ThemeException;

class Theme
{
    /**
     * 获取专题的接口
     * @url /theme?ids=id1,id2,...
     * @return  一组theme模型
     */
    public function getSimpleList($ids = '')
    {
        (new IDCollection())->goCheck();
        $ids = explode(',', $ids);
        $data = ThemeModel::with('topicImg,headImg')
            ->select($ids);
        if (empty($data)) {
            throw new ThemeException();
        }
        return $data;
    }

    /**
     * 获取专题详情的接口
     * @url /theme/id
     * @return  一组theme模型
     */
    public function getComplexOne($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $theme = ThemeModel::getThemeWithProducts($id);
        if (!$theme) {
            throw new ThemeException();
        }
        return $theme;


    }
}