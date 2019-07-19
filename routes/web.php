<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index/pay','Index\PayController@pay');
Route::get('/index/payy','Index\PayController@payy');//支付路由显示支付宝码
//Route::get('/index/orderlist','Index\PayController@orderlist');//同步跳转地址

Route::get('/index/return_erl','Index\PayController@return_url');//同步通知
Route::get('/index/notify_url','Index\PayController@notify_url');//异步通知


Route::get('/student/index', 'Index\StudentController@index');

Route::get('/student/delete', 'Index\StudentController@delete');


Route::post('/student/save', 'Index\StudentController@save');

Route::get('/student/eirt', 'Index\StudentController@eirt');

Route::post('/student/update', 'Index\StudentController@update');

//登录视图的路由
Route::get('/index/login', 'Index\StudentController@login');
//登录处理的路由
Route::post('/index/dologin', 'Index\StudentController@dologin');
//调用中间件
Route::group(['middleware' => ['login']], function () {
    //添加学生信息
    Route::get('/student/create', 'Index\StudentController@create');

});

//注册的路由
Route::get('/index/register','Index\StudentController@register');
//注册处理的路由
Route::post('/index/doregister', 'Index\StudentController@doregister');

//登录视图的路由
Route::get('/index/login', 'Index\StudentController@login');
//调用中间件
Route::group(['middleware' => ['dologin']], function () {

});

//文件上传视图的路由
Route::get('admin/file','Admin\FileController@file');
//文件上传处理的视图
Route::post('admin/dofile','Admin\FileController@dofile');

//后台注册的路由
Route::get('/admin/register','Admin\LoginController@register');
//后台处理注册的路由
Route::post('/admin/doregister', 'Admin\LoginController@doregister');
//后台登录的视图
Route::get('/admin/login', 'Admin\LoginController@login');
//后台登录处理的路由
Route::post('/admin/dologin', 'Admin\LoginController@dologin');
//后台首页的路由
Route::get('/admin/index', 'Admin\IndexController@index');
//后台商品视图的路由
Route::get('/admin/shangpin', 'Admin\ShangpinController@shangpin');
//后台商品处理的路由
Route::post('/admin/doshangpin', 'Admin\ShangpinController@doshangpin');
//后台商品列表的路由
Route::get('/admin/spindex', 'Admin\ShangpinController@spindex');
//后台商品删除的路由
Route::get('/admin/spdelete', 'Admin\ShangpinController@spdelete');
//后台商品修改的视图路由
Route::get('/admin/speite', 'Admin\ShangpinController@speite');
//后台商品修改的处理路由
Route::post('/admin/spupdate', 'Admin\ShangpinController@spupdate');


//前台首页的路由
Route::get('/index/index', 'Index\IndexController@index');

//前台详情页面的路由
Route::get('/index/spxiangqing', 'Index\IndexController@spxiangqing');

//前台购物车添加视图的
Route::get('/index/spgouwuce', 'Index\CartController@spgouwuce');
//前台购物车的列表
Route::get('/index/spgucindex', 'Index\CartController@spgucindex');

//前台订单详情的路由
Route::get('/index/spdingdan', 'Index\CartController@spdingdan');

