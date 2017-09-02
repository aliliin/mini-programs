<?php

use think\Route;

/**
 * Route 经常用的参数（路由表达式，路由真实地址，请求的类型，路由参数（数组），变量规则（数组））
 *          url的后缀，你的控制器方法     GET|POST   判断https访问但是必须是数组
 */

Route::get('/','api/v1.index/index');
//主题banner
Route::get('api/v1/banner/:id','api/v1.Banner/getBanner');
//获取主题的路由.
Route::get('/api/v1/theme','api/v1.theme/getSimpleList');
//具体点击专题进入的详情
Route::get('/api/v1/theme/:id','api/v1.theme/getComplexOne');
//获取最新的商品
Route::get('/api/v1/product/recent','api/v1.product/getRecent');
//分类列表下的具体详情.
Route::get('/api/v1/product/by_category','api/v1.product/getAllInCategory');
//具体某个商品详情页
Route::get('/api/v1/product/:id','api/v1.product/getOne');

//分类列表
Route::get('/api/v1/category/all','api/v1.category/getAllCategories');
//获取用户的token
Route::post('/api/v1/token/user','api/v1.token/getToken');
//用户的收货地址
Route::post('/api/v1/address','api/v1.address/createOrUpdateAddress');

//用户下单接口
Route::post('/api/v1/order','api/v1.order/placeOrder');
