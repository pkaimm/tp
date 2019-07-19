@extends('layouts.qiantai')
@section('title','前台首页')
@section('body')

    <div class="section product">
        <div class="container">
            <div class="section-head">
                <h4>新产品</h4>
                <div class="divider-top"></div>
                <div class="divider-bottom"></div>
            </div>

            <div class="row">
                @foreach($data as $k=>$v)
                <div class="col s6">
                    <div class="content">

                        <a href="{{url('/index/spxiangqing')}}?id={{$v->id}}"><img src="{{$v->goods_pic}}" alt="" width="200" height="200"></a>
                        <h6><a href="">{{$v->goods_name}}</a></h6>
                        <div class="price">
                            ${{$v->goods_price}} <span>$28</span>
                        </div>
                        <a href="javascript:void(0)">添加购物车</a>
                    </div>

            </div>
                @endforeach
        </div>

    </div>
    </div>
    {{--<script>--}}
        {{--layui.use(['jquery'],function(){--}}
            {{--var $ =layui.jquery;--}}

            {{--$(function(){--}}
                {{--$('.pk').click(function(){--}}
                    {{----}}
                {{--})--}}
            {{--})--}}
        {{--})--}}

    {{--</script>--}}

    <div class="promo section">
        <div class="container">
            <div class="content">
                <h4>产品捆绑</h4>
                <p>爱一个人 真的会变强 堪比 海格勒斯</p>
                <button class="btn button-default">现在去购物车</button>
            </div>
        </div>
    </div>



    <div class="section product">
        <div class="container">
            <div class="section-head">
                <h4>顶级产品你值得拥有</h4>
                <div class="divider-top"></div>
                <div class="divider-bottom"></div>
            </div>
            <div class="row">
                @foreach($data as $k=>$v)
                <div class="col s6">
                    <div class="content">
                        <a href="{{url('index/spxiangqing')}}"><img src="{{$v->goods_pic}}" alt="" width="200" height="200"></a>
                        <h6><a href="">{{$v->goods_name}}</a></h6>
                        <div class="price">
                            ${{$v->goods_price}} <span>$28</span>
                        </div>
                        <button class="btn button-default">加入购物车</button>
                    </div>
                </div>
                    @endforeach
            </div>

            <div class="pagination-product">
                <ul>
                    <li class="active">1</li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href="">5</a></li>
                </ul>
            </div>
        </div>
    </div>
   
@endsection




