<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class KsController extends Controller
{
    public function ksdenglu(Request $request)
    {
        return view('/admin/ksdenglu');
    }
    public function ksdl(Request $request)
    {
        $id=$request->all();
        $ser = DB::connection('mysql_shop2')->table('ksdenglu')->where(['name'=>$id['name'],'pwd'=>$id['pwd']])->first();
        //dd($data);
        if(empty($ser)){
            echo "<script>alert('账号密码错误'),location.href='/admin/ksdenglu'</script>";
        }else{
            $request->session()->put('ser',$ser);
            return redirect('/admin/tixing');
        }

    }

    //提型的视图
    public function tixing()
    {
        return view('/admin/tixing');
    }
    //提型单选的视图
    public function danxuan(Request $request)
    {
        $data=$request->all();
        //dd($data);
        return view('/admin/danxuan',['data'=>$data]);
    }
    //提型单选的添加入库
    public function dodanxuan(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        //dd($data);
        $ser=DB::connection('mysql_shop2')->table('ti')->insertGetId($data);
        if($ser){
            echo "<script>alert('添加成功'),location.href='/admin/tianjiasj'</script>";
        }
    }

    //提型单选的添加试卷方法
    public function tianjiasj()
    {
        return view('/admin/tianjiasj');
    }
    //提型单选的生成试卷的列表方法
    public function shengchengsj(Request $request)
    {
        $data=DB::connection('mysql_shop2')->table('ti')->get()->toArray();
        //dd($data);
        return view('/admin/shengchengsj',['data'=>$data]);
    }
    //提型单选的试卷入库的路由
    public function sjrk(Request $request)
    {
        $ser=$request->all();
        ///dd($ser);
        $data=DB::connection('mysql_shop2')->table('ti')->get()->toArray();
        //dd($data);
        $ser=DB::connection('mysql_shop2')->table('shijuan')->insert([
            'biaoti'=>$ser['biaoti'],
        ]);
        if($ser){
            echo "<script>alert('添加成功'),location.href='/admin/lianjie'</script>";
        }
    }
    //产生试卷的链接
    public function lianjie()
    {
        $data=DB::connection('mysql_shop2')->table('shijuan')->get()->toArray();
        //dd($data);
        return view('/admin/lianjie',['data'=>$data]);
    }
    //产生试卷的链接2
    public function dolianjie(Request $request)
    {
        $ser=$request->all();
        dd($ser);
    }
}
