@extends('layouts.index')
@section('title','商品列表')
@section('body')

    <div class="rightmain" id="rightmain">
        <div class="rightcontent">
            <form action="">
            <table class="layui-table">
                <colgroup>
                    <col width="150">
                    <col width="200">
                    <col>
                </colgroup>
                <thead>
                <tr>
                    <th>id</th>
                    <th>商品名称</th>
                    <th>商品价格</th>
                    <th>商品图片</th>
                    <th>添加时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->goods_name}}</td>
                    <td>{{$v->goods_price}}</td>
                    <td><img src="{{$v->goods_pic}}"></td>
                    <td>{{date('Y-m-d h:i:s',$v->add_time)}}</td>
                </tr>
                 @endforeach
                </tbody>
            </table>
            </form>
        </div>
    </div>

@endsection