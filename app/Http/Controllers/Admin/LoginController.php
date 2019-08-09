<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Controllers\Jieko\JiekoController;


class LoginController extends Controller
{
    //后台注册的视图
    public function register()
    {

        return view('/admin/register');
    }
    //后台处理注册的方法
    public function doregister(Request $request)
    {
        $data=$request->all();
       //dd($data);
        unset($data['_token']);
        unset($data['button']);
        unset($data['s']);
        $ser=DB::connection('mysql_shop2')->table('register')->insert($data);
        if($ser){
            return redirect('/admin/login');
        }
    }

    //后台登录的视图
    public function login()
    {
        JiekoController::login();
        return view('/admin/login');
    }
    //后台登录的处理
    public function dologin(Request $request)
    {
        $data=$request->all();
        //dd($data);
        unset($data['_token']);
        unset($data['_token']);
        $ser=DB::connection('mysql_shop2')->table('register')->where(['name'=>$data['name'],'pwd'=>$data['pwd']])->first();
        //dd($ser);
        if(empty($ser)){
            echo "<script>alert('账号或密码错误'),location.href='/admin/login'</script>";
        }else{
            $request->session()->put('ser',$ser);
            return redirect('/admin/index');
        }
    }
}
