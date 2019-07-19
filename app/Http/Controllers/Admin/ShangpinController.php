<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ShangpinController extends Controller
{
    //商品控制器

    //商品添加视图
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
        unset($data['s']);
        $flies=$request->file('goods_pic');
        if(empty($flies)){
            //未传图片
            echo "fail";die();
        }else{
            //已传图片
            $path=$flies->store('goods');
            $data['goods_pic']='/'.'storage'.'/'.$path;
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
        $ser=$request->all();
        //dd($ser);
        $ss="";
        if(!empty($ser['ss'])){
            $ss=$ser['ss'];
            $data=DB::connection('mysql_shop2')->table('goods')->where('goods_name','like',"%".$ser['ss']."%")->paginate(2);
        }else{
            $data=DB::connection('mysql_shop2')->table('goods')->paginate(2);
        }
        //dd($data);
        return view('/admin/spindex',['data'=>$data,'ss'=>$ss]);
    }

    //商品删除
    public function spdelete(Request $request)
    {
        $data=$request->all();
        //dd($data);
        unset($data['s']);
        $ser=DB::connection('mysql_shop2')->table('goods')->delete($data);
        //dd($ser);
        if($ser){
            return redirect('/admin/spindex');
        }
    }

    //商品修改的视图
    public function speite(Request $request)
    {
        $data=$request->all();
        unset($data['s']);
        $ser=DB::connection('mysql_shop2')->table('goods')->where(['id'=>$data['id']])->first();
        //dd($ser);
        return view('admin/speite',['ser'=>$ser]);
    }

    //商品修改的处理方法
    public function spupdate(Request $request)
    {
        $data=$request->all();
        //dd($data);
        unset($data['_token']);
        unset($data['s']);
        $ser=DB::connection('mysql_shop2')->table('goods')->where(['id'=>$data['id']])->update($data);
        //dd($ser);
        if($ser){
            return redirect('admin/spindex');
        }
    }
}
