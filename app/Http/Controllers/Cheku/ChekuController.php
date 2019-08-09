<?php

namespace App\Http\Controllers\Cheku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ChekuController extends Controller
{
    //车库首页
    public function ckindex()
    {
        return view('/cheku/ckindex');
    }

    //添加车位
    public function ckcreate()
    {
        return view('/cheku/ckcreate');
    }
    //添加处理车位
    public function cksave(Request $request)
    {
        $data=$request->all();
        //dd($data);
        unset($data['_token']);
        $ser=DB::connection('mysql_shop2')->table('car')->first();
        if(!empty($ser)){
            $data['shengyu']=$ser->shengyu+$data['sum'];
            $data['sum'] += $ser->sum;
            DB::connection('mysql_shop2')->table('car')->where('id',$ser->id)->update($data);
        }else{
            $data['shengyu']=$data['sum'];
            Db::connection('mysql_shop2')->table('car')->insert($data);
        }

        return redirect('/cheku/ckindex');
    }

    //添加车库门卫
    public function ckmenwei()
    {
        return view('/cheku/ckmenwei');
    }
    //处理车库门卫添加
    public function ckmwcl(Request $request)
    {
        $data=$request->all();
        if(empty($data['user'])){
            echo "<script>alert('门卫名称不能为空');history.back(0)</script>";die;
        }
        unset($data['_token']);
        $data=DB::connection('mysql_shop2')->table('menwei')->insert($data);
        if($data){
            return redirect('/cheku/ckindex');
        }

    }

    //车位管理的路由
    public function ckguanli()
    {
        $data=DB::connection('mysql_shop2')->table('car')->first();
        //dd($data);
        return view('/cheku/ckguanli',['data'=>$data]);
    }

    //车辆入库
    public function ckrk()
    {
        return view('/cheku/ckrk');
    }
    //车辆入库处理
    public function ckrkcl(Request $request)
    {
        $data=$request->all();
        if(empty($data['chepaihao']))
        {
            echo "<script>alert('车牌号不能为空');history.back(0)</script>";die;
        }
        $ser=DB::connection('mysql_shop2')->table('inout')->where('chepaihao',$data['chepaihao'])->where('outtime',0)->first();
        //dd($ser);
        if(!empty($ser)){
            echo "<script>alert('该车牌号未出场');history.back(0)</script>";die;
        }
        unset($data['_token']);
        $data['intime']=time();
        $a=DB::connection('mysql_shop2')->table('inout')->insert($data);
        $carinfo=DB::connection('mysql_shop2')->table('car')->first();
        DB::connection('mysql_shop2')->table('car')->where(['id',$carinfo->id])->update([
            'shengyu'=>$carinfo->shengyu-1,
            'num'=>$carinfo->num+1
        ]);
        return redirect('/cheku/ckguanli');
    }
    //车辆出库
    public function ckck()
    {
        return view('/cheku/ckck');
    }
    //处理车辆出库
    public function ckckcl(Request $request)
    {
        $data=$request->all();
        if(empty($data['chepaihao']))
        {
            echo "<script>alert('车牌号不能为空');history.back(0)</script>";die;
        }
      $inoutinfo= DB::connection('mysql_shop2')->table('inout')->where('chepaihao','=',$data['chepaihao'])->where('intime','>',0)->where('outtime',0)->first();
        //dd($inoutinfo);
//       if(!empty($inoutinfo)){
//           echo "<script>alert('该车牌号未进库');history.back(0)</script>";die;
//       }
       unset($data['_token']);
       $data['outtime']=time();
       $chaji=time() - ($inoutinfo->intime);
       if($chaji<900){
           $data['money']=0;
       }else{
           if($chaji>=900&&$chaji<3600*6){
               $ban=(int)ceil($chaji/1800);
               $data['money']=$ban*2;
           }else{
               $zheng=(int)ceil($chaji/1800);
               $data['money']=24+($zheng-6);
           }
       }
       DB::connection('mysql_shop2')->table('inout')->where('id','=',$inoutinfo->id)->update($data);
       $car=DB::controller('mysql_shop2')->table('car')->first();
       //dd($car);
       DB::connection('mysql_shop2')->table('car')->where('id',$car->id)->update([
            'shengyu'=>$car->shengyu+1,
            'money'=>$car->money+$data['money'],
        ]);
        return redirect()->action('Cheku\ChekuController@detail',['id'=>$inoutinfo->id]);
    }

    //收费详情
    public function ckshoufei()
    {
        $id=request()->get('id');
        $data=DB::connection('mysql_shop2')->table('inout')->where('id',$id)->first();
        $chaji=($data->outtime)-($data->intime);
        if($chaji>3600){
            $hours=(int)floor($chaji/60*60);
            $minute=(int)ceil(($chaji-$hours*3600)/60);
        }else{
            $minute=(int)ceil($chaji/60);
            $hours=0;
        }
        return view('detail',['data'=>$data,'hours'=>$hours,'minute'=>$minute]);
    }
    //收费统计
    public function info()
    {
        $data=DB::connection('mysql_shop2')->table('car')->first();
        return view('info',['data'=>$data]);
    }

}
