<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加竞猜</title>
</head>
<body>
<form action="{{url('/jingcai/jcsave')}}" method="post">
    @csrf
    <table>
        <tr>
        <td><h3>添加竞猜</h3></td>
        </tr>
        <tr>
            <td>
                <input type="text" name="name">vs<input type="text" name="cname">
            </td>
        </tr>
        <tr>
            <td><h3>结束时间:<input type="type" name="add_time" ></h3></td>
        </tr>
        <tr>
            <td><input type="submit" value="添加"></td>
        </tr>
    </table>
</form>
</body>
</html>