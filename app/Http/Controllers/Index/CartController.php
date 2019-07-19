<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CartController extends Controller
{
    public function spgouwuce(Request $request)
    {
        $data=$request->all();
        //dd($data);
        $user=session('ser');
        if(empty($user)){
            return redirect('/index/login');
        }
        $goods_id=DB::connection('mysql_shop2')->table('goods')->where(['id'=>$data['id']])->first();
        //dd($goods_id);
        //dd(session('ser')->id);
        $array=[
            'id'=>session('ser')->id,
            'goods_id'=>$goods_id->id,
            'goods_name'=>$goods_id->goods_name,
            'goods_pic'=>$goods_id->goods_pic,
            'goods_price'=>$goods_id->goods_price,
            'add_time'=>time(),
        ];
        //dd($array);
        $pk=DB::connection('mysql_shop2')->table('cart')->insert($array);
        //dd($pk);
        if($pk){
            echo "<script>alert('添加购物车成功'),location.href='/index/spgucindex'</script>";
        }

    }

    //购物车列表
    public function spgucindex(Request $request)
    {
        $data=DB::connection('mysql_shop2')->table('cart')->get()->toArray();
        //dd($data);
        //求总价
        $price=array_column($data,'goods_price');
        $sum=array_sum($price);
        return view('/index/spgouwuce',['data'=>$data,'sum'=>$sum]);
    }

    //前台订单详情的视图
    public function spdingdan(Request $request)
    {
        //获取session
        $id=session('ser');
        //dd($id);
        //获取总价格
        $sum=$request->all();
        //dd($id);
        //生成订单号
        $oid=time().mt_rand(1000,1111);
        $state=0;
        //添加订单
        $data= DB::connection('mysql_shop2')->table('order')->insert([
            'oid'=>$oid,
            'id'=>$id->id,
            'sum'=>$sum['sum'],
            'state'=>$state,
            'pay_time'=>time(),
            'add_time'=>time()
        ]);
         //添加订单详情表
        $data = Db::connection('mysql_shop2')->table('cart')->get();
            foreach($data as $k=>$v){
                DB::connection('mysql_shop2')->table('order_detail')->insert([
                    'oid'=>$oid,
                    'goods_id'=>$v->id,
                    'goods_name'=>$v->goods_name,
                    'goods_pic'=>$v->goods_pic,
                    'add_time'=>time(),
                    'sum'=>$sum['sum'],
                    ]);
    }
        return view('/index/spdingdan',['oid'=>$oid,'sum'=>$sum['sum'],'data'=>$data]);
    }
}
