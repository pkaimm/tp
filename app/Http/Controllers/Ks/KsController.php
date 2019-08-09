<?php

namespace App\Http\Controllers\Ks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class KsController extends Controller
{
    //注册视图
    public function zhuce()
    {
        return view('/ks/zhuce');
    }
    //处理注册
    public  function dozhuce(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        //dd($data);
        $ser=DB::connection('mysql_shop2')->table('ks')->insert($data);
        if($ser){
            return redirect('/ks/denglu');
        }
    }
    //登录视图
    public function denglu()
    {
        return view('/ks/denglu');
    }
    //处理登录
    public function dodenglu(Request $request)
    {
        $data=$request->all();
        //dd($data);
        $ser=DB::connection('mysql_shop2')->table('ks')->where(['name'=>$data['name'],'pwd'=>$data['pwd']])->first();
        if(empty($ser)){
            echo "<script>alert('账号或密码错误'),location.href='/ks/denglu'</script>";
        }else{
            $request->session()->put('ser',$ser);
            return redirect('/ks/xwtj');
        }
    }

    //新闻添加
    public function xwtj()
    {
        return view('/ks/xwtj');
    }

    //新闻处理添加
    public function do(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $data['add_time']=time();
        $path=$request->file('pic')->store('goods');
        $data['pic']='/'.'storage'.'/'.$path;
        $ser=DB::connection('mysql_shop2')->table('doks')->insert($data);
        if($ser){
            return redirect('/ks/ksindex');
        }
    }

    //列表
    public function ksindex(Request $request)
    {
        $redis=new \Redis();
        $redis->connect('127.0.0.1','6379');
        $data=$redis->incr('num');
        echo "访问次数:".$data;
        $data=DB::connection('mysql_shop2')->table('doks')->paginate(2);
        //dd($data);
        return view('/ks/ksindex',['data'=>$data]);
    }

    //删除
    public function delete(Request $request)
    {
        $id=$request->all();
        $ser=DB::connection('mysql_shop2')->table('doks')->delete($id);
        if($ser){
            return redirect('/ks/ksindex');
        }
    }
}
