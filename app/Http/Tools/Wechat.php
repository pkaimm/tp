<?php


namespace  App\Http\Tools;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class Wechat{
    public $request;
    public $wechat;
    public function __construct(Request $request,Wechat $wechat)
    {
        $this->request = $request;
        $this->wechat = $wechat;
    }

    //获取用户全部信息
    public function wechat_user_info($openid)
    {
        $access_token = $this->get_access_token();
        $wechat_user= file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid."&lang=zh_CN");
        $user_info=json_decode($wechat_user,1);
        return $user_info;
    }

    /**
     * 获取access_token
     */
    public function get_access_token(){
        //获取access_token
        $redis = new \Redis;
        $redis->connect('127.0.0.1','6379');
        $access_token_key = 'wechat_access_token';
        if ($redis->exists($access_token_key)){
            $access_token = $redis->get($access_token_key);

        }else{
            $acc = file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".env('WECHAT_APPID')."&secret=".env('WECHAT_APPSCRET'));
            $access_result = json_decode($acc,1);
            $access_token = $access_result['access_token'];
            $expire_time = $access_result['expires_in'];
            //加入缓存
            $redis->set($access_token_key,$access_token,$expire_time);
        }
        return $access_token;
    }

    /**
     * post请求
     * @param $url
     * @param $data
     * @return bool|string
     */
    public function post($url, $data = []){
        //初使化init方法
        $ch = curl_init();
        //指定URL
        curl_setopt($ch, CURLOPT_URL, $url);
        //设定请求后返回结果
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //声明使用POST方式来进行发送
        curl_setopt($ch, CURLOPT_POST, 1);
        //发送什么数据
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //忽略证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        //忽略header头信息
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //设置超时时间
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        //发送请求
        $output = curl_exec($ch);
        //关闭curl
        curl_close($ch);
        //返回数据
        return $output;
    }

    /**
     * 根据openid发送模板消息
     * @param $openid
     * @return bool|string
     */
    public function push_template($openid,$id)
    {
        //$openid = 'otAUQ1XOd-dph7qQ_fDyDJqkUj90';
        $url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$this->get_access_token();
        $data = [
            'touser'=>$openid,
            'template_id'=>$id,
            'url'=>'http://www.baidu.com',
            'data' => [
                'first' => [
                    'value' => '商品名称',
                    'color' => ''
                ],
                'keyword1' => [
                    'value' => '低价',
                    'color' => ''
                ],
                'keyword2' => [
                    'value' => '是低价',
                    'color' => ''
                ],
                'remark' => [
                    'value' => '备注',
                    'color' => ''
                ]
            ]
        ];
        $re = $this->post($url,json_encode($data));
        return $re;
    }

    /**
     * 上传微信素材资源
     */
    public function upload_source($up_type,$type,$title='',$desc='')
    {
        $file = $this->request->file($type);
        $file_ext = $file->getClientOriginalExtension();
        //重命名
        $new_file_name = time().rand(1000,9999).'.'.$file_ext;
        //文件保存路径
        //保存文件
        $save_file_path = $file->storeAs('wechat/'.$type,$new_file_name);  //返回保存成功之后的路径
        $path = './storage/'.$save_file_path;
        if ($up_type == 1) {
            $url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token='.$this->get_access_token().'&type='.$type;
        }elseif ($up_type == 2) {
            $url = 'https://api.weixin.qq.com/cgi-bin/material/add_material?access_token='.$this->get_access_token().'&type='.$type;
        }
        $multipart = [
            [
                'name' => 'media',
                'contents' =>fopen(realpath($path),'r')
            ]
        ];
        if ($type == 'video' && $up_type ==2){
            $multipart[] = [
                'name' => 'description',
                'contents' => json_decode(['title'=>$title,'introduction'=>$desc])
            ];
        }
        $response = $this->client->request('POST',$url,[
            'multipart' =>$multipart
        ]);
        //获取返回
        $body = $response->getBody();
        unlink($path);
        //入库
        $body = json_decode($body,1);
        if ($up_type ==1){
            $res = DB::connection('mysql_shop3')->table('source')->insert([
                'up_type' =>$up_type,
                'media_id' =>$body['media_id'],
                'add_time' => $body['created_at'],
                'type' => $type
            ]);
            if ($res){
                return '上传成功';
            }else{
                return '上传失败';
            }
        }
    }

}