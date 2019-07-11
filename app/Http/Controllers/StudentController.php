<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public  function  index(Request $request)
    {
            //开启sql
            DB::connection('mysql_shop')->enableQuerylog();
            $data=DB::connection('mysql_shop')->table('shop_car')->where('goods_name','like','%22%')->get()->toArray();
            //获取以执行的查询数组
            $sql=DB::connection('mysql_shop')->getQuerylog();
            //var_dump($sql);
            //dd($data);
            $redis=new \Redis();
            $redis->connect('127.0.0.1','6379');
            $data=$redis->incr('num');
            //$dataa=$redis->del('num');
            //var_dump($dataa);
            echo "访问次数:".$data;

            $ser=$request->all();
            $ss="";
            if(!empty($ser['ss'])){
                $ss=$ser['ss'];
                $info=DB::table('Student')->where('name','like',"%".$ser['ss']."%")->paginate(2);
            }else{
                $info=DB::table('Student')->paginate(2);
            }
            return view('Student',['info'=>$info,'ss'=>$ss]);
    }

    //登录的视图
    public function login(Request $request)
    {
        //$request->session()->put('name','123');
        return view('login');
    }

    //处理登录的方法
    public function dologin(Request $request)
    {
       $data=$request->all();
       //dd($data);
        $ser=DB::table('register')->where(['name'=>$data['name'],'pwd'=>$data['pwd']])->first();
        //dd($ser);
        if(empty($ser)){
            echo "<script>alert('账号密码错误'),location.href='/student/login'</script>>";
        }else{
            $request->session()->put('ser',$ser);
            return redirect('/student/index');
        }

    }

    //注册的视图
    public function register()
    {
        return view('register');
    }

    //注册的处理页面
    public function doregister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ],[
            'name.required'=>'名字不能为空',
        ]);

        $data=$request->all();
        //dd($data);
        unset($data['_token']);
        $ser=DB::connection('mysql_shop2')->table('Register')->insert($data);
        //dd($ser);
        if($ser){
            return redirect('student/login');
        }
    }

    public function create()
    {
        return view('create');
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ],[
            'name.required'=>'名字不能为空',
        ]);
        $data=$request->all();
        $data['create_time']=time();
        //dd($data);
        //删除令牌
        unset($data['_token']);
        $ser=DB::table('Student')->insert($data);
        //dd($ser);die;
        if($ser){
            echo json_encode(['font'=>'添加成功','code'=>1]);
        }

    }



    //删除的方法
    public function delete(Request $request)
    {
        $id=$request->all();
        //dd($id);
        $ser=DB::table('Student')->delete($id);
        //dd($ser);
        if($ser){
            return redirect('/student/index');
        }
    }

    //修改的视图
    public function eirt(Request $request)
    {
        $ser=$request->all();
        $data=DB::table('Student')->where(['id'=>$ser['id']])->first();
        //dd($data);
        return view('eirt',['data'=>$data]);
    }

    //处理修改
    public function update(Request $request)
    {
        $ser=$request->all();
        unset($ser['_token']);
        //dd($ser);
        $data=DB::table('Student')->where(['id'=>$ser['id']])->update($ser);
        //dd($data);
        if($data){
            echo json_encode(['font'=>'修改成功','code'=>1]);
        }
    }
}
