<?php

namespace App\Http\Controllers\Jingcai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class JingcaiController extends Controller
{
    public function jccreate()
    {
        return view('/jingcai/jccreate');
    }
    //处理添加
    public function jcsave(Request $request)
    {
        $data=$request->all();
        $data['add_time']=strtotime($data['add_time']);
//        dd($data);
        unset($data['_token']);
        $ser=DB::connection('mysql_shop2')->table('jingcai')->insert($data);
        if($ser){
            echo "<script>alert('添加成功正在跳向竞猜列表'),location.href='/jingcai/jcindex'</script>";
        }
    }

    //竞猜列表
    public function jcindex()
    {
        $data=DB::connection('mysql_shop2')->table('jingcai')->get()->toArray();
        //dd($data);
        return view('/jingcai/jcindex',['data'=>$data]);
    }

    //我要竞猜
    public function jc(Request $request)
    {
        $ser=$request->all();
        $data=DB::connection('mysql_shop2')->table('jingcai')->where(['id'=>$ser['id']])->first();
        return view('/jingcai/jc',['data'=>$data]);
    }

    //竞猜结果入库
    public function jcjieguo(Request $request)
    {
            $data=$request->all();
//            dd($data);
            $ser=DB::connection('mysql_shop2')->table('jingcai')->where(['id'=>$data['id']])->first();
            $res=DB::connection('mysql_shop2')->table('jcjieguo')->insert([
                'id'=>$ser->id,
                'name'=>$ser->name,
                'cname'=>$ser->cname,
                'type'=>$data['type']
            ]);
           if($res){
//               return  redirect()->action('Jingcai\JingcaiController@jcjg',['id'=>$data['id']]);
               return redirect('/jingcai/jcindex');
           }
    }

    //竞猜结果后台
    public function jcjg(Request $request)
    {
        $id=$request->all();
        //dd($id);
        $data=DB::connection('mysql_shop2')->table('jcjieguo')->where(['id'=>$id['id']])->first();
        //dd($data);
        return view('/jingcai/jcjg',['data'=>$data]);
    }

    //接口
    public function jieko()
    {
        return view('/jingcai/jieko');
    }

}
