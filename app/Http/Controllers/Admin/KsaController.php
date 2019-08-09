<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class KsaController extends Controller
{
    //考试调研a卷的调研添加
    public function ksatj()
    {
        return view('/admin/ksatj');
    }
    //考试调研a卷的调研单选 复选
    public function ksadanxuan(Request $request)
    {
        $data=$request->all();
        //dd($data);
        return view('/admin/ksadanxuan',['data'=>$data]);
    }
    //考试调研a卷问题入库
    public function ksasave(Request $request)
    {
        $data=$request->all();
        //dd($data);
        unset($data['_token']);
        $ser=DB::connection('mysql_shop2')->table('ksa')->insert($data);
        if($ser){
            echo "<script>alert('添加成功'),location.href='/admin/ksatjdy'</script>>";
        }
    }
    //考试调研添加调研的方法
    public function ksatjdy()
    {
        return view('/admin/ksatjdy');
    }
    //考试调研列表的方法
    public function ksaindex(Request $request)
    {
        $data=DB::connection('mysql_shop2')->table('ksa')->paginate(2);
        //dd($data);
        return view('/admin/ksaindex',['data'=>$data]);
    }
    //考试调研链接的方法
    public function ksalianjie()
    {
        $data=DB::connection('mysql_shop2')->table('ksa')->get()->toArray();
        return view('/admin/ksalianjie',['data'=>$data]);
    }
    //考试调研链接详情
    public function ksaxq(Request $request)
    {
        $ser=$request->all();
        dd($ser);

    }
    //考试调研列表删除
    public function ksadelete(Request $request)
    {
        $id=$request->all();
        //dd($id);
        $ser=DB::connection('mysql_shop2')->table('ksa')->delete($id);
        //dd($ser);
        if($ser){
            echo "<script>alert('删除成功'),location.href='/admin/ksaindex'</script>";
        }
    }
}
