<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>单选 复选</title>
</head>
<body>
<form action="{{url('/admin/ksasave')}}" method="post">
    @csrf
    <table>
            @if($data['a']==1)
           <h3><input type="text" name="biaoti" value="你在公司使用的php框架是什么"></h3>
        <tr>
            <td><input type="radio" name="a" value="laravel">A:<input type="text" value="laravel"></td>
            <td><input type="radio" name="a" value="Yll2.0">B:<input type="text" value="Y112.0"></td>
            <td><input type="radio" name="a" value="ThinkPHP">C:<input type="text" value="ThinkPHP"></td>
            <td><input type="radio" name="a" value="Cl">D:<input type="text" value="Cl"></td>
            <td><input type="submit" value="添加问题"></td>
        </tr>
            @else
            <h3><input type="text" name="biaoti" value="你认为现在需要学习的技术是什么"></h3>
        <tr>
            <td><input type="checkbox" name="A" value="直播技术">A:<input type="text" value="直播技术"></td>
            <td><input type="checkbox" name="B" value="框架">B:<input type="text" value="框架"></td>
            <td><input type="checkbox" name="C" value="APL">C:<input type="text" value="APL"></td>
            <td><input type="checkbox" name="D" value="架构">D:<input type="text" value="架构"></td>
            <td><input type="submit" value="添加问题"></td>
        </tr>
           @endif
    </table>
</form>
</body>
</html>