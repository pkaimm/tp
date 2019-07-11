
@extends('layouts.common')
@section('title','登录')
@section('body')
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>登录</h3>
            </div>
            <div class="login">
                <div class="row">
                    <form action="{{url('student/dologin')}}" method="post">
                        @csrf
                        <div class="input-field">
                            <input type="text" name="name" placeholder="用户名" required>
                        </div>
                        <div class="input-field">
                            <input type="password" name="pwd" placeholder="密码" required>
                        </div>
                        <div class="input-field">
                            <input type="email" name="email" placeholder="邮箱" required>
                        </div>
                        <a href=""><h6>Forgot Password ?</h6></a>
                        <div class="btn button-default">
                            <input type="submit" value="登录">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
