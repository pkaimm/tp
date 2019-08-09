<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>选择题</title>
</head>
<body>
<form action="{{url('/admin/dodanxuan')}}" method="post">
    @csrf
    <table>
        @if($data['a']==1)
        <h3><input type="text" value="laravel框架定义中间件的关键词是" name="biaoti"></h3>
        <tr>
            <td><input type="radio" name="A" value="middleware">A <input type="text" value="middleware" disabled="disabled"></td>
            <td><input type="radio" name="B" value="controller">B <input type="text" value="controller" disabled="disabled"></td>
            <td><input type="radio" name="C" value="model">C <input type="text" value="model" disabled="disabled"></td>
            <td><input type="radio" name="D" value="migration">D <input type="text" value="migration" disabled="disabled"></td>
            <td><input type="submit" value="添加"></td>
        </tr>
        @elseif($data['a']==2)
        <h3 ><input type="text" value="面向对象的特性是" name="biaoti"></h3>
        <tr>
            <td><input type="checkbox" name="A" value="封装">A: <input type="text" value="封装"></td>
            <td><input type="checkbox" name="B" value="继承">B: <input type="text" value="继承"></td>
            <td><input type="checkbox" name="C" value="多太">C: <input type="text" value="多太"></td>
            <td><input type="checkbox" name="D" value="抽象">D: <input type="text" value="抽象"></td>
            <td><input type="submit" value="添加"></td>
        </tr>
        @else
        <h3><input type="text" value="laravel只能使用composer安装" name="biaoti"></h3>
        <tr>
            <td><input type="radio" name="panduan">正确</td>
            <td><input type="radio" name="panduan">错误</td>
            <td><input type="submit" value="添加"></td>
        </tr>
            @endif
    </table>
</form>
</body>
</html>