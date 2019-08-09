<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>调研添加</title>
</head>
<body>
<form action="{{url('/admin/ksadanxuan')}}" method="post">
    @csrf
    <table>
        <tr>调研问题：<input type="text" name="biaoti" value="你在公司使用的php框架是什么"></tr>
        <br/>
        <tr>
            问题选项：
            <input type="radio" name="a" value="1">单选
            <input type="checkbox" name="a" value="2">复选
        </tr>
        <br>
        <tr><input type="submit" value="添加问题"></tr>
    </table>
</form>
</body>
</html>