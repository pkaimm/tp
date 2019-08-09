<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PiaoController extends Controller
{
    public function cpcreate()
    {
        return view('/admin/cpcreate');
    }
    public function cpsave(Request $request)
    {
       $data=$request->all();
       //dd($data);
        unset($data['_token']);
        $data['create_time']=time();
        $data['daoda_time']=time();
       $ser=DB::connection('mysql_shop2')->table('chechi')->insert($data);
       if($ser){
           return redirect('/admin/cpindex');
       }
    }

    public function cpindex(Request $request)
    {
        //使用redis统计搜索的次数，例如搜索北京到上海，没搜索一次统计次数+1
        $req=$request->all();
       $redis=new \Redis();//实例化redis类
       $redis->connect('127.0.0.1','6379');//连接redis
            //判断搜索的值是否为空
            if (!empty($req['cfd']) || !empty($req['ddd'])) {
                $redis->incr('num');
                $data = DB::connection('mysql_shop2')->table('chechi')
                    ->where('cfd', 'like', "%{$req['cfd']}%")
                    ->where('ddd', 'like', "%{$req['ddd']}%")
                    ->get()->toArray();
            } else {
                $data = DB::connection('mysql_shop2')->table('chechi')->get()->toArray();
            }
                //记录搜索次数 原子计数器
                echo "访问次数:".$redis->get('num');//有值就加 没值不加

        //dd($data);
        return view('/admin/cpindex',['data'=>$data,'cfd'=>$req['cfd'],'ddd'=>$req['ddd']]);
    }
}
