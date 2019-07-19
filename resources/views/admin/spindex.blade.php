@extends('layouts.index')
@section('title','商品列表')
@section('body')

    <div class="rightmain" id="rightmain">
        <div class="rightcontent">
            <form action="{{url('/admin/spindex')}}" method="get">
                @csrf
                <input type="text" name="ss" value="{{$ss}}">
                <input type="submit" value="搜索">
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
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->goods_name}}</td>
                    <td>{{$v->goods_price}}</td>
                    <td><img src='{{asset("$v->goods_pic")}}'></td>
                    <td>{{date('Y-m-d h:i:s',$v->add_time)}}</td>
                    <td>
                        <a href="/admin/spdelete?id={{$v->id}}">删除</a>||
                        <a href="/admin/speite?id={{$v->id}}">修改</a>
                    </td>
                </tr>
                 @endforeach

                <tr>
                    <td colspan="7">
                        {{ $data->appends(['ss' =>$ss])->links() }}
                        {{--//{{ $data->links() }}--}}
                    </td>
                </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>

@endsection