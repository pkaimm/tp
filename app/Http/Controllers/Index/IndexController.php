<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    //前台首页
    public function index(Request $request)
    {
        $data=DB::connection('mysql_shop2')->table('goods')->get();
        //dd($data);
        return view('/index/index',['data'=>$data]);
    }

    //前台商品详情
    public function spxiangqing(Request $request)
    {
        $id=$request->all();
        //dd($id);
        $data=DB::connection('mysql_shop2')->table('goods')->where(['id'=>$id['id']])->first();
       // dd($v);
        return view('/index/spxiangqing',['data'=>$data]);
    }
    
}
