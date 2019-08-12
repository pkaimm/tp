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

//周考后台的添加路由
Route::get('/admin/cpcreate', 'Admin\PiaoController@cpcreate');
//周考后台的处理添加路由
Route::post('/admin/cpsave', 'Admin\PiaoController@cpsave');
//周考后台的列表路由
Route::get('/admin/cpindex', 'Admin\PiaoController@cpindex');
//周考后台的登录路由
Route::get('/admin/ksdenglu', 'Admin\KsController@ksdenglu');
//周考后台的登录路由
Route::post('/admin/ksdl', 'Admin\KsController@ksdl');
//周考后台的提型的路由
Route::get('/admin/tixing', 'Admin\KsController@tixing');
//周考后台的单选的路由
Route::get('/admin/danxuan', 'Admin\KsController@danxuan');
//周考后台的单选添加入库的路由
Route::post('/admin/dodanxuan', 'Admin\KsController@dodanxuan');
//周考后台的单选添加试卷的路由
Route::get('/admin/tianjiasj', 'Admin\KsController@tianjiasj');
//周考后台的单选添加试卷列表的路由
Route::post('/admin/shengchengsj', 'Admin\KsController@shengchengsj');
//周考后台的单选添加试卷列表的路由
Route::post('/admin/sjrk', 'Admin\KsController@sjrk');
//周考后台的单选添加试卷链接的路由
Route::get('/admin/lianjie', 'Admin\KsController@lianjie');
//周考后台的单选添加试卷链接2的路由
Route::get('/admin/dolianjie', 'Admin\KsController@dolianjie');

//周考后台A卷调研添加问题的路由
Route::get('/admin/ksatj','Admin\KsaController@ksatj');
//周考后台A卷调研添加问题单选的路由
Route::post('/admin/ksadanxuan','Admin\KsaController@ksadanxuan');
//周考后台A卷调研问题入库的路由
Route::post('/admin/ksasave','Admin\KsaController@ksasave');
//周考后台A卷添加调研的路由
Route::get('/admin/ksatjdy','Admin\KsaController@ksatjdy');
//周考后台A卷添加调研列表的路由
Route::post('/admin/ksaindex','Admin\KsaController@ksaindex');
//周考后台A卷生成链接的路由
Route::get('/admin/ksalianjie','Admin\KsaController@ksalianjie');
//周考后台A卷链接详情的路由
Route::get('/admin/ksaxq','Admin\KsaController@ksaxq');
//周考后台A卷删除的路由
Route::get('/admin/ksadelete','Admin\KsaController@ksadelete');

//竞猜的添加路由
Route::get('/jingcai/jccreate','Jingcai\JingcaiController@jccreate');
//竞猜的处理添加路由
Route::post('/jingcai/jcsave','Jingcai\JingcaiController@jcsave');
//竞猜的处理列表路由
Route::get('/jingcai/jcindex','Jingcai\JingcaiController@jcindex');
//竞猜的处理列表路由
Route::get('/jingcai/jc','Jingcai\JingcaiController@jc');
//竞猜的结果入库路由
Route::post('/jingcai/jcjieguo','Jingcai\JingcaiController@jcjieguo');
//竞猜的后台结果路由
Route::get('/jingcai/jcjg','Jingcai\JingcaiController@jcjg');
//接口联系
Route::get('/jingcai/jieko', 'Jingcai\JingcaiController@jieko');


//车库的首页列表
Route::get('/cheku/ckindex','Cheku\ChekuController@ckindex');
//车库的添加
Route::get('/cheku/ckcreate','Cheku\ChekuController@ckcreate');
//车库的添加处理
Route::post('/cheku/cksave','Cheku\ChekuController@cksave');
//车库添加门卫
Route::get('/cheku/ckmenwei','Cheku\ChekuController@ckmenwei');
//车库处理添加门卫
Route::post('/cheku/ckmwcl','Cheku\ChekuController@ckmwcl');
//车库管理的路由
Route::get('/cheku/ckguanli','Cheku\ChekuController@ckguanli');
//车库车辆入库的路由
Route::get('/cheku/ckrk','Cheku\ChekuController@ckrk');
//车库车辆入库处理的路由
Route::post('/cheku/ckrkcl','Cheku\ChekuController@ckrkcl');

//车库车辆出库的路由
Route::get('/cheku/ckck','Cheku\ChekuController@ckck');
//车库车辆出库处理的路由
Route::post('/cheku/ckckcl','Cheku\ChekuController@ckckcl');
//车库收费详情
Route::get('/cheku/detail','Cheku\ChekuController@detail');
//车库数据统计
Route::get('/cheku/info','Cheku\ChekuController@info');

//注册的路由
Route::get('/login/zhuce','Login\LoginController@zhuce');


//考试路由
Route::get('/ks/zhuce','Ks\KsController@zhuce');
//考试处理注册路由
Route::post('/ks/dozhuce','Ks\KsController@dozhuce');
//考试处理登录路由
Route::get('/ks/denglu','Ks\KsController@denglu');
//考试处理登录路由
Route::post('/ks/dodenglu','Ks\KsController@dodenglu');
//考试新闻视图
Route::get('/ks/xwtj','Ks\KsController@xwtj');
//考试新闻添加
Route::post('/ks/do','Ks\KsController@do');
//考试新闻列表
Route::get('/ks/ksindex','Ks\KsController@ksindex');
//考试新闻列表删除
Route::get('/ks/delete','Ks\KsController@delete');

//微信
Route::get('wechat/get_user_list', 'wechat\WechatController@get_user_list');
Route::get('wechat/get_user_info', 'wechat\WechatController@get_user_info');
Route::get('wechat/user_list', 'wechat\WechatController@user_list');
Route::get('wechat/user_details', 'wechat\WechatController@user_details');
Route::get('wechat/login', 'wechat\WechatController@login');
Route::get('wechat/code', 'wechat\WechatController@code');
Route::get('wechat/template_list', 'wechat\WechatController@template_list');
//删除模板
Route::get('wechat/del_template', 'wechat\WechatController@del_template');
Route::get('wechat/send_template', 'wechat\WechatController@send_template');
//上传素材
Route::get('wechat/upload', 'wechat\WechatController@upload');
Route::post('wechat/do_upload', 'wechat\WechatController@do_upload');
Route::get('wechat/get_source', 'wechat\WechatController@get_source');
Route::get('wechat/get_video_source', 'wechat\WechatController@get_video_source');
Route::get('wechat/get_voice_source', 'wechat\WechatController@get_voice_source');
//素材列表
Route::get('wechat/source_list', 'wechat\WechatController@source_list');
//获取永久素材列表
Route::get('wechat/upload_source', 'wechat\WechatController@upload_source');
//创建标签
Route::get('wechat/create_tag', 'wechat\WechatController@create_tag');
Route::post('wechat/save_tag', 'wechat\WechatController@save_tag');
Route::get('wechat/tag_list', 'wechat\WechatController@tag_list');
Route::get('wechat/del_tag', 'wechat\WechatController@del_tag');
Route::get('wechat/add_user_tag', 'wechat\WechatController@add_user_tag');
//标签下粉丝
Route::get('wechat/tag_fans', 'wechat\WechatController@tag_fans');
//粉丝下的标签
Route::get('wechat/get_user_tag', 'wechat\WechatController@get_user_tag');
Route::get('wechat/del_user_tag', 'wechat\WechatController@del_user_tag');
//修改标签
Route::get('wechat/edit_tag', 'wechat\WechatController@edit_tag');
Route::post('wechat/update_tag', 'wechat\WechatController@update_tag');
Route::get('wechat/push_tag_message', 'wechat\WechatController@push_tag_message');
Route::post('wechat/do_push_tag_message', 'wechat\WechatController@do_push_tag_message');