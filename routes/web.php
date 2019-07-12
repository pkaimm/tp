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
Route::get('/student/index', 'StudentController@index');

Route::get('/student/delete', 'StudentController@delete');


Route::post('/student/save', 'StudentController@save');

Route::get('/student/eirt', 'StudentController@eirt');

Route::post('/student/update', 'StudentController@update');

//登录视图的路由
Route::get('/student/login', 'StudentController@login');
//登录处理的路由
Route::post('/student/dologin', 'StudentController@dologin');
//调用中间件
Route::group(['middleware' => ['login']], function () {
    //添加学生信息
    Route::get('/student/create', 'StudentController@create');

});

//注册的路由
Route::get('/student/register','StudentController@register');
//注册处理的路由
Route::post('/student/doregister', 'StudentController@doregister');

//调用中间件
Route::group(['middleware' => ['dologin']], function () {
    //登录视图的路由
    Route::get('/student/login', 'StudentController@login');

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
//后台商品的路由
Route::get('/admin/shangpin', 'Admin\ShangpinController@shangpin');