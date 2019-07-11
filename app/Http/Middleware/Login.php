<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        $data=$request->session()->has('name');
        //dd($data);
        if($data){
            echo "登录成功";
        }
        $response = $next($request);

        //后置
        echo 2222;

        return $response;

    }
}
