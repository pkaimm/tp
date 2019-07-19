<?php

namespace App\Http\Middleware;

use Closure;

class Ks
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //前置
//        $h = date('H');
//        if ($h < 12 || $h>17){
//            echo '商品修改需要在【9:00-17:00】才可以进入';die();
//        }
        //echo 111;
        //业务逻辑
        //从9点到17点进入
        $p=strtotime('9:00:00');//每天9点
        $k=strtotime('17:00:00');//每天17点
        $ss=time();//现在时间
        if($ss<=$p && $ss>=$k){
            //可以通过
        }else{
            //不能通过
            echo "每天15点和17点之间修改";
        }
        $response = $next($request);

        //后置

        return $response;
    }
}
