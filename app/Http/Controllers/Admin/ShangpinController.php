<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ShangpinController extends Controller
{
    //商品控制器

    //商品视图
    public function shangpin()
    {
        return view('/admin/shangpin');
    }

    //商品添加
    public function doshangpin(Request $request)
    {
        $data=$request->all();
        //dd($data);
        $data['add_time']=time();
        unset($data['_token']);
        $flies=$request->file('goods_pic');
        if(empty($flies)){
            //未传图片
            echo "fail";die();
        }else{
            //已传图片
            $path=$flies->store('goods');
            $data['goods_pic']=asset('storage').'/'.$path;
        }
        $ser=DB::connection('mysql_shop2')->table('goods')->insert($data);
        //dd($ser);
        if($ser){
            return redirect('/admin/spindex');
        }
    }

    //商品列表
    public function spindex(Request $request)
    {
        $data=DB::connection('mysql_shop2')->table('goods')->get()->toArray();
        //dd($data);
        return view('/admin/spindex',['data'=>$data]);
    }
}
