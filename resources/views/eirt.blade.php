<link rel="stylesheet" href="/static/layui/css/layui.css">
<script src="/static/layui/layui.js"></script>
<script type="/static/jquery-3.3.1.js"></script>
<form class="layui-form" action="" id="formDemo">
    @csrf
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-block">
            <input type="text" name="name"  placeholder="请输入姓名" autocomplete="off" class="layui-input" value="{{$data->name}}">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-input-inline">
            <input type="text" name="age"  placeholder="请输入性别" autocomplete="off" class="layui-input" value="{{$data->age}}"  >
        </div>

    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">年龄</label>
        <div class="layui-input-inline">
            <input type="text" name="ext"  placeholder="请输入年龄" autocomplete="off" class="layui-input" value="{{$data->ext}}">
        </div>

    </div>
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">修改</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<script>
    //Demo
    layui.use(['form','jquery'], function(){
        var form = layui.form,$=layui.jquery;

        //     // //监听提交
        //     // form.on('submit(formDemo)', function(data){
        //     //     layer.msg(JSON.stringify(data.field));
        //     //     return false;
        //     // });
        //
        $(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            })
            $('#formDemo').submit(function(){
                //接受表单的值
                var data=$('#formDemo').serialize();
                //alert(data);
                //判断是否为ajax发送请求
                $.post(
                    "/student/update",
                    data,
                    function(msg){
                        alert(msg.font);
                        if(msg.code==1){
                            location.href="/student/index";
                        }
                    },
                    'json'
                );
                return false;
            });
        })
    });

</script>