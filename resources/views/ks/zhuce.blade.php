@extends('layouts.admin')
@section('title','注册')
@section('body')
    <div class="loginmain">
        <h2>注册管理系统</h2>
        <form action="{{url('/ks/dozhuce')}}" method="post" class="form-horizontal">
        @csrf
        <!-- 让表单在一行中显示form-horizontal -->
            <div class="form-group">
                <label for="username" class="col-lg-1 control-label">用户名</label>
                <div class="col-lg-4">
                    <input type="text" name="name" id="username" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="form-group"></div>
            <div class="form-group"></div>

            <div class="form-group">
                <label for="password" class="col-lg-1 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
                <div class="col-lg-4">
                    <input type="password" name="pwd" id="password" class="form-control" placeholder="pwd">
                </div>
            </div>

            <div class="form-group"></div>
            <!-- <div class="form-group"></div> -->

            <div class="form-group">
                <div class="col-lg-11 col-lg-offset-1">
		                <span class="checkbox ">
		                    <label><input type="checkbox" name="" class="checkbox-inline">记住我</label>
		                </span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-4 col-lg-offset-1">
                    <input type="submit"  value="注册" >
                </div>

            </div>

        </form>
    </div>



@endsection