<?php

namespace App\Http\Controllers\Jieko;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Tools\Wechat;
use GuzzleHttp\Client;
use DB;


class JiekoController extends Controller
{

    public $request;
    public $wechat;
    public function __construct(Request $request,Wechat $wechat)
    {
        echo 111;
        $this->request = $request;
        $this->wechat = $wechat;
    }



    //调用ecod
    public static function login()
    {

        $redirect_uri='http://ww.tp.com/jieko/code';
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".env('WECHAT_APPID')."&redirect_uri=".urlencode($redirect_uri)."&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
        header('Location:'.$url);
    }
    public function code(Request $request)
    {
        $req=$request->all();
        $code=$req['code'];
        //获取access_token
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".env('WECHAT_APPID')."&secret=".env('WECHAT_APPSCRET')."&code=".$code."&grant_type=authorization_code";
        $re=file_get_contents($url);
        $result= json_decode($re,1);
        $access_token=$result['access_token'];
        $openid=$result['openid'];
        dd($openid);
        //获取用户全部信息
        $wechat_user_info = $this->wechat->wechat_user_info($openid);
        //去user_wechat表里查数据 是否有openid openid=$openids
        $user_openid=DB::connention('mysql_shop3')->table("user_wechat")->where('openid',$openid)->first();
        if(!empty($user_openid)){
            //有数据 在网站有用户 user表有数据【登录】
            $user_info=DB::connection('mysql_shop3')->table('user')->where(['id'=>$openid['uid']])->first();
            $request->session()->put('username',$user_info['name']);
        }else{
            //没有数据 注册信息 insert user user_openid 生成新用户
            DB::connection('mysql_shop3')->beginTransaction();
            $user_result = DB::connection('mysql_shop3')->table('user')->insertGetId([
                'password'=>'',
                'name'=>$wechat_user_info['nickname'],
                'reg_time'=>time()
            ]);
            $openid_result = DB::connection('mysql_shop3')->table('user_wechat')->insert([
                'uid'=>$user_result,
                'openid'=>$openid,
            ]);
            DB::connection('mysql_shop3')->commit();
            //登录操作
            $user_info=DB::connection('mysql_shop3')->table('user')->where(['id'=>$openid['uid']])->first();
            $request->session()->put('username',$user_info['name']);
            header('Location:ww.tp.com');

        }

    }
    //粉丝列表
    public function user_list()
    {
        $openid_info = DB::connection('mysql_shop3')->table('user_wechat')->get();
        return view('/jieko/userList',['openid_info'=>$openid_info]);
    }

    public function get_user_list()
    {
        $access_token = $this->wechat->get_access_token();
        //拉取关注用户列表
        $wechat_user = file_get_contents("https://api.weixin.qq.com/cgi-bin/user/get?access_token={$access_token}&next_openid=");
        $user_info = json_decode($wechat_user,1);
        foreach($user_info['data']['openid'] as $v){
            $subscribe = DB::connection('mysql_shop3')->table('user_wechat')->where(['openid'=>$v])->value('subscribe');
            if(empty($subscribe)){
                //获取用户详细信息
                $user = $this->wechat_user_info($v);
                DB::connection('mysql_shop3')->table('user_wechat')->insert([
                    'openid' => $v,
                    'add_time' => time(),
                    'subscribe' => $user['subscribe']
                ]);
            }else{
                //获取用户详细信息
                $access_token = $this->wechat->get_access_token();
                $openid = $v;
                $wechat_user = file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid."&lang=zh_CN");
                $user = json_decode($wechat_user,1);
                if($subscribe != $user['subscribe']){
                    DB::connection('mysql_shop3')->table('user_wechat')->where(['openid'=>$v])->update([
                        'subscribe' => $user['subscribe'],
                    ]);
                }
            }
        }
        echo "<script>history.go(-1);</script>";
    }



    //获取模板列表
    public function index()
    {
        echo 111;
        $url="https://api.weixin.qq.com/cgi-bin/template/get_all_private_template?access_token=".$this->wechat->get_access_token();
        $re=file_get_contents($url);
        $re=json_decode($re,1);
        return view('/jieko/doindex',['re'=>$re]);
    }

    //删除模板
    public  function delete(Request $request)
    {
        $id=$request->all()['id'];
        $url="https://api.weixin.qq.com/cgi-bin/template/del_private_template?access_token=".$this->wechat->get_access_token();
        $data=[
            "template_id" => $id
        ];
        $re=$this->wechat->post($url,json_encode($data));
        //dd($re);
        if($re){
            echo "<script>alert('删除成功'),location.href='/jieko/index'</script>";
        }
    }

    /**
     * 推送模板消息
     */
    public function pushtemplate(Request $request)
    {
        $id=$request->all()['id'];
        //dd($id);
        $openid_info = DB::connection('mysql_shop3')->table("user_wechat")->select('openid')->limit(1)->get()->toArray();
        foreach($openid_info as $v){
            $res = $this->wechat->push_template($v->openid,$id);
        }

    }

    //素材管理
    public function upload()
    {
        //echo 1;
        return view('/jieko/upload');
    }
    public function do_upload()
    {
        $upload_type = $this->request->all()['up_type'];

        if ($this->request->hasFile('image')) {
            $res = $this->wechat->upload_source($upload_type,'image');
        } elseif ($this->request->hasFile('voice')) {
            $res = $this->wechat->upload_source($upload_type, 'vice');
        } elseif ($this->request->hasFile('video')) {
            $res = $this->wechat->upload_source($upload_type,'video','视频标题','视频描述');

        } elseif ($this->request->hasFile('thumb')) {
            //缩略图
            $res = $this->wechat->upload_source($upload_type, 'thumb');
        }
        echo $res;
        die();
    }

    public function get_source()
    {
        $media_id = $this->request->all()['id'];
        $url = 'https://api.weixin.qq.com/cgi-bin/media/get?access_token='.$this->wechat->get_access_token().'&media_id='.$media_id;
        //保存图片
        $client = new Client();
        $response = $client->get($url);
//        $h = $response->getHeaders();
//        echo '<pre>';print_r($h);echo '</pre>';die;
        $file_info = $response->getHeader('Content-disposition');
        $file_name = substr(rtrim($file_info[0],'"'),-20);
        //保存图片
        $path = 'wechat/image/'.$file_name;
        $res = Storage::disk('local')->put($path, $response->getBody());
        echo env('APP_URL').'/storage/'.$path;
        dd($res);
    }

    //获得视频
    public function get_video_source()
    {
//      $media_id = 'Hidj0QYd420g66U_zr-NefRJMfYMUJy__S5zrq6RJ6Sb3GaEmoMXUMMveiJLF6yL';
        $media_id = $this->request->all()['id'];
        $url = 'https://api.weixin.qq.com/cgi-bin/media/get?access_token='.$this->wechat->get_access_token().'&media_id='.$media_id;
        $client = new client();
        $response = $client->get($url);
//        echo $response->getBody();
//        $res = file_get_contents($url);
//        file_put_cont|ents('./uploads/1.mp3',$res);
        $video_url = json_decode($response->getBody(),1)['video_url'];
        $file_name = explode('/',parse_url($video_url)['path'])[2];
        //设置超时参数
        $opts=array(
            "http"=>array(
                "method"=>"GET",
                "timeout"=>3  //单位秒
            ),
        );
        //创建数据流上下文
        $contents = stream_context_create($opts);
        //$url请求的地址：例如
        $read = file_get_contents($video_url,false,$contents);
        $res = file_put_contents('./storage/wechat/video/' . $file_name, $read);

        var_dump($res);
        die();
    }
    //音频
    public function get_voice_source()
    {
        $media_id = $this->request->all()['id'];
        $url = 'https://api.weixin.qq.com/cgi-bin/media/get?access_token='.$this->wechat->get_access_token().'&media_id='.$media_id;
        //保存图片
        $client = new Client();
        $response = $client->get($url);
        //获取文件名
//        $h = $response->getHeaders();
//        echo '<pre>';print_r($h);echo '</pre>';die;
        $file_info = $response->getHeader('Content-disposition');
        $file_name = substr(rtrim($file_info[0],'"'),-20);
//        $wx_image_path = 'wx/images'.$file_name;
        //保存音频
        $path = 'wechat/voice/'.$file_name;
        $res = Storage::put($path,$response->getBody());
        echo env('APP_URL').'/storage/'.$path;
        dd($res);
    }
    //素材列表
    public function source_list()
    {
        $data = DB::connection('mysql_shop3')->table('source')->get()->toArray();
        return view('jieko/source_list',['data'=>$data]);
    }
//获取永久素材
    public function upload_source()
    {
        $type = $this->request->all()['type'];
        $url = 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token='.$this->wechat->get_access_token();
        $data = ['type'=>$type,'offset'=>0,'count'=>20];
        $res = $this->wechat->post($url,json_encode($data));
        $data = json_decode($res, 1);

        $data = json_decode($res,1);
        return view('jieko/upload_source',['data'=>$data]);
    }
    //删除永久素材
    public function del_source()
    {
        $media_id = $this->request->all();
        $url = 'https://api.weixin.qq.com/cgi-bin/material/del_material?access_token='.$this->wechat->get_access_token();
        $this->wechat->post($url,json_encode($media_id));
    }

    //添加用户标签
    public function tag()
    {
        dd(1111);
        return view('webjieko.tag');
    }
}
