@extends('layouts.index')
@section('title','商品添加')
@section('body')

    <div class="rightmain" id="rightmain">
        <div class="rightcontent">
            <form class="layui-form" action="{{url('/admin/doshangpin')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="layui-form-item">
                    <label class="layui-form-label">商品名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="goods_name" placeholder="请输入商品名称" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">商品价格</label>
                    <div class="layui-input-inline">
                        <input type=text" name="goods_price"  placeholder="请输入商品价格" >
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">商品图片</label>
                    <div class="layui-input-inline">
                        <input type="file" name="goods_pic" >
                    </div>

                </div>


                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
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