@extends('layouts.index')
@section('title','商品修改')
@section('body')

    <div class="rightmain" id="rightmain">
        <div class="rightcontent">
            <form class="layui-form" action="{{url('/admin/spupdate')}}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="layui-form-item">
                    <label class="layui-form-label">商品名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="goods_name" placeholder="请输入商品名称"  value="{{$ser->goods_name}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">商品价格</label>
                    <div class="layui-input-inline">
                        <input type=text" name="goods_price"  placeholder="请输入商品价格" value="{{$ser->goods_price}}">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">商品图片</label>
                    <div class="layui-input-inline">
                        <input type="file" name="goods_pic">
                        <img src="{{$ser->goods_pic}}" >
                    </div>

                </div>

                <input type="hidden" name="id" value="{{$ser->id}}">

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即修改</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>

            <script>
                //Demo
                layui.use('form', function(){
                    var form = layui.form;

                    // //监听提交
                    // form.on('submit(formDemo)', function(data){
                    //     layer.msg(JSON.stringify(data.field));
                    //     return false;
                    // });
                });
            </script>
        </div>
    </div>


@endsection