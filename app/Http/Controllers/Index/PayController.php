<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Pay;
use DB;

class PayController extends Controller
{
    public $app_id;
    public $gate_way;
    public $notify_url;
    public $return_url;
    public $rsaPrivateKeyFilePath = '';  //路径
    public $aliPubKey = '';  //路径
    public $privateKey = 'MIIEogIBAAKCAQEAy+8BdZNd6L/pUjc7iADVveFa2YRB2qaZRsXu756fgRdvuR0YtFa64WptVWhC8YuTCpWR1mP170fF51ltN2sALJHh2N1rzlKMezw/xteaKFFaAF57RWRF+GzFX7di0AUEYFp4vMQ+T9U0v9BJfHy7jna6MKO3/j+oBI/UAERneABmEUTmRGbV38FyJ9GMHQs4NiqX9Zfjum5y57HHSYT9o2dwaAD4VXrbyL5H7E25jjLohNyYehRO3ewZBpuBer74/LzF5/LsJJsAOTXAtX8sJAEKegj/UXgf46fCP4y4VPGRCQybqj5vAaYKFqeE0RHi957yWVtRbR3r/s1rpM5oEQIDAQABAoIBAF4Ugt3VAGvRrTfqlyIlEHYqspjKdP8EAI4v3gzZZshNIZOKosz/ffNj/9B46vk35LvrSH5ZWynqOJiEHuiECm6FVmWPsJ5cYsavgtSevlV/QkANVl0q50S2GVAQ8Br7VYuF8VFUT1LRDya2VlCB0pzklPy/arB2eXKxT6JX7EvlQC0aQFr4exjelj9GGCaJsboXKMB2ciNtYZBNY6JMS58wr2gypbyXod5ZbPAY+3sQg9vExj8Sd4rpITx19Tw82Gjv3O0/5SmRziLwx/6ym8sMybzldcB0s7+Fg7l2uZFw3RDlgNjDTnn4tZh8U/nbyV/D1bOdUurCdIicqZXKoSkCgYEA7pDB3mvUVmf6dcdvWOuYBsD+BNEXYeSEOijUlfCkLCjNlsea2B/SWIDzdtXPuAmU8fRCgpYIjfCIj9nNNlUDK7AVJtwEvwL9t9r589ffpZ/wPh7Qc9leeeczHH3q/y+TtU6WwY7Nqszq1fdY4XFNWT4FFjeJA6ciuDmGIX+ffBcCgYEA2tZVKNL+YzWmg0dM87M4kD4LaOTeXtU5hJTOsoKFWvVKFUvpb+SqXyi9fsoz3rM865Jolerhpii0dwZNrZHK3kUMgG+4CHBIw8OYoLAUubqbYlk6uU/PGcQWMVtTfmGvFtUCSuf5mrBCS10EdfiNsYIUSNKpHUn5g8cHkCp3DhcCgYAYOpt1+32VSPom/BpS7ZqDFRa3ZoT5bDwBrCPrFoWV9o7qwVr4mELEulP/vbda+Z4m9KfMm3BC+irkcTpmSjwIM9nyGGZi/+rEwXihS0trhtLffEGvgmQV/WUzf5ZeVHar809cWSSKNEWldXmRa/BvH91kZD+GH3NnQnBc9pk8AQKBgFUCAV60Z6E+TAqe/eOE8SoHEAOVNFR+W7OG4qwxS4BD3J1dObb/ircgakwAXBncYoPYAcyKy1Dyavf5eN89zSJ+jBawTzrn8zwolPeGruZe+NFBfDBUMkz+AOj3Yv2rEIq8AAH9DtbqNTZ1UbBJ9zDHKP4I5yy7ebOY8vUrqcfNAoGAc9PWIxsN7PLMetP2z49MWnabSOfWRv3Gn6u49/sjc+mYz1pOHZCpMrWuZBrUmP6J/vCkbKwbeL+2OSLKHDwPmIpeP5ozzlrTnCkq03YxvM824Vjpdpk0O45OnlvrU1Qr6aOGwvDrX3qCDHJ6180zC8uKdxHx3qMRab2YjDYRjug=';
    public $publicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA5Squ5eZoZfuEO0T0BLk94cX9HM0Y+s9bV1nMoD8etxm/IVV2p6nljy19Ht99KOZKx/hITLCLP/aLQ2R6O06pmYxTP2ix/zkjuaOFo0jteH5DC4zfa2iZaBmJmiDifwm72xApcWgYZTZhjp91NKzkkj+3eLLQqxxcdw75/h2Q+bR4K4NKXAzn5yDg8qxWlv/YsUHfOZlAqRzmtgxfyHaXJOgFeg8EjtVy/lRCDr98FiVi2RxzyKPjIkxAvvpUhWKuQg832MkV8iXOs0JxjUhEBemn+xtT3dvhIAqTnZ2dHudrXkJa2CuaA6DUGcIqBR3p9+kXRzbuPP9qdo6yUAloqQIDAQAB';
    public function __construct()
    {
        $this->app_id = '2016101100657586';
        $this->gate_way = 'https://openapi.alipaydev.com/gateway.do';
        $this->notify_url = env('APP_URL').'/notify_url';
        $this->return_url = env('APP_URL').'/return_url';
    }

    public function pay(){
        $oid = time().mt_rand(1000,1111);  //订单编号
        $order = [
            'out_trade_no' => $oid,
            'total_amount' =>1,
            'subject' => 'test subject - 战神',
        ];

        return Pay::alipay()->web($order);

    }

    public function notify_url()
    {
        $post_json=file_get_contents("php://input");
        \Log::Info($post_json);
        $post = json_decode($post_json,1);
        //业务处理
    }
    
    public function rsaSign($params) {
        return $this->sign($this->getSignContent($params));
    }
    protected function sign($data) {
    	if($this->checkEmpty($this->rsaPrivateKeyFilePath)){
    		$priKey=$this->privateKey;
			$res = "-----BEGIN RSA PRIVATE KEY-----\n" .
				wordwrap($priKey, 64, "\n", true) .
				"\n-----END RSA PRIVATE KEY-----";
    	}else{
    		$priKey = file_get_contents($this->rsaPrivateKeyFilePath);
            $res = openssl_get_privatekey($priKey);
    	}
        
        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
        if(!$this->checkEmpty($this->rsaPrivateKeyFilePath)){
            openssl_free_key($res);
        }
        $sign = base64_encode($sign);
        return $sign;
    }
    public function getSignContent($params) {
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === $this->checkEmpty($v) && "@" != substr($v, 0, 1)) {
                // 转换成目标字符集
                $v = $this->characet($v, 'UTF-8');
                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }
        unset ($k, $v);
        return $stringToBeSigned;
    }

    

    /**
     * 根据订单号支付
     * [ali_pay description]
     * @param  [type] $oid [description]
     * @return [type]      [description]
     */
    public function payy(Request $request){
        $order = $request->all();
        $sum = $order['sum'];
        $oid = $order['oid'];
        $order_info = $order;
        //业务参数
        $bizcont = [
            'subject'           => 'Pk战神--' .$oid,
            'out_trade_no'      => $oid,
            'total_amount'      => $sum,
            'product_code'      => 'FAST_INSTANT_TRADE_PAY',
        ];
        //公共参数
        $data = [
            'app_id'   => $this->app_id,
            'method'   => 'alipay.trade.page.pay',
            'format'   => 'JSON',
            'charset'   => 'utf-8',
            'sign_type'   => 'RSA2',
            'timestamp'   => date('Y-m-d H:i:s'),
            'version'   => '1.0',
            'notify_url'   => $this->notify_url,        //异步通知地址
            'return_url'   => $this->return_url,        // 同步通知地址
            'biz_content'   => json_encode($bizcont),
        ];
        //签名
        $sign = $this->rsaSign($data);
        $data['sign'] = $sign;
        $param_str = '?';
        foreach($data as $k=>$v){
            $param_str .= $k.'='.urlencode($v) . '&';
        }
        $url = rtrim($param_str,'&');
        $url = $this->gate_way . $url;
        //dd($url);
        header("Location:".$url);
    }
    protected function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;
        return false;
    }
    /**
     * 转换字符集编码
     * @param $data
     * @param $targetCharset
     * @return string
     */
    function characet($data, $targetCharset) {
        if (!empty($data)) {
            $fileType = 'UTF-8';
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
            }
        }
        return $data;
    }
    /**
     * 支付宝同步通知回调
     */
    public function aliReturn()
    {
        $oid=$_GET['out_trade_no'];
        //修改订单状态
        DB::table('order')->where('oid',$oid)->update([
            'state'=>1,
        ]);
        header('Refresh:2;url=/index/orderlist?oid=$oid');
        echo "<h2>订单： ".$_GET['out_trade_no'] . ' 支付成功，正在跳转</h2>';
    }
    /**
     * 支付宝异步通知
     */
    public function aliNotify()
    {
        $data = json_encode($_POST);
        $log_str = '>>>> '.date('Y-m-d H:i:s') . $data . "<<<<\n\n";
        //记录日志
        file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
        //验签
        $res = $this->verify($_POST);
        $log_str = '>>>> ' . date('Y-m-d H:i:s');
        if($res){
            //记录日志 验签失败
            $log_str .= " Sign Failed!<<<<< \n\n";
            file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
        }else{
            $log_str .= " Sign OK!<<<<< \n\n";
            file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
            //验证订单交易状态
            if($_POST['trade_status']=='TRADE_SUCCESS'){
                
            }
        }
        
        echo 'success';
    }
    //验签
    function verify($params) {
        $sign = $params['sign'];
        if($this->checkEmpty($this->aliPubKey)){
            $pubKey= $this->publicKey;
            $res = "-----BEGIN PUBLIC KEY-----\n" .
                wordwrap($pubKey, 64, "\n", true) .
                "\n-----END PUBLIC KEY-----";
        }else {
            //读取公钥文件
            $pubKey = file_get_contents($this->aliPubKey);
            //转换为openssl格式密钥
            $res = openssl_get_publickey($pubKey);
        }
        
        
        ($res) or die('支付宝RSA公钥错误。请检查公钥文件格式是否正确');
        //调用openssl内置方法验签，返回bool值
        $result = (bool)openssl_verify($this->getSignContent($params), base64_decode($sign), $res, OPENSSL_ALGO_SHA256);
        
        if(!$this->checkEmpty($this->aliPubKey)){
            openssl_free_key($res);
        }
        return $result;
    }
}
