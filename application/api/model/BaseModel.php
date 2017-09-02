<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/8/28
 * Time: 下午1:35
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    //读取数据表中字段url的图片路径
    public function prefixImgUrl($val,$data)
    {
        $finalUrl = $val;
        //因为有些文件不是存在本地的.根据数据表中的form字段判断
        if($data['from'] == 1){
            return config('setting.img_prefix') . $val;
        }
        return $finalUrl;

    }
}