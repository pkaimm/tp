<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    //注册的视图
    public function zhuce()
    {
        return view('/login/zhuce');
    }
}
