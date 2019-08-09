<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加试卷列表</title>
</head>
<body>
<form action="{{url('/admin/shengchengsj')}}" method="post">
    @csrf
    <table>
        <tr>
            <td>试卷名称：</td>
            <td><input type="text" value="laravel框架第一次考试"></td>
        </tr>
        <tr>
            <td><input type="submit" value="添加"></td>
        </tr>
    </table>
</form>
</body>
</html>