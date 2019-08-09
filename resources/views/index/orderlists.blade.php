@extends('layouts.common')
@section('title','同步跳转列表')
@section('body')
<table border="1">

    <tr>
        <th>ID</th>
        <th>商品名称</th>
        <th>商品小计</th>
        <th>商品图片</th>
        <th>添加时间</th>
    </tr>
    @foreach($data as $k=>$v)
    <tr>
        <th>{{$v->id}}</th>
        <th>{{$v->goods_name}}</th>
        <th>{{$v->sum}}</th>
        <th><img src="{{asset($v->goods_pic)}}" alt=""></th>
        <th>{{date('Y-m-d h:i:s',$v->add_time)}}</th>
    </tr>
        @endforeach
</table>
@endsection