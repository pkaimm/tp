@extends('layouts.common')
@section('title','注册')
@section('body')
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>注册</h3>
            </div>
            <div class="register">
                <div class="row">
                    <form action="{{url('/index/doregister')}}" method="post">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="input-field">
                            <input type="text" name="name"  placeholder="用户名">
                        </div>
                        <div class="input-field">
                            <input type="email" placeholder="邮箱" name="email" >
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="密码" name="pwd" >
                        </div>
                        <div class="btn button-default">
                            <input type="submit" value="注册">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection