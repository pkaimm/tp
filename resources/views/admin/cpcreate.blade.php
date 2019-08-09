<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加视图</title>
</head>
<body>
    <form action="{{url('/admin/cpsave')}}" method="post">
        @csrf

        <table border="1">
            <tr>
                <td> 车次:  <input type="text" name="chechi"></td>
            </tr>
            <tr>
                <td>出发地：<input type="text" name="cfd"></td>
            </tr>
            <tr>
                <td>到达地：<input type="text" name="ddd"></td>
            </tr>
            <tr>
                <td>价钱：<input type="text" name="price"></td>
            </tr>
            <tr>
                <td>张数：<input type="text" name="zhangshu"></td>
            </tr>
            <tr>
                <td><input type="submit" value="添加"></td>
            </tr>
        </table>
    </form>
</body>
</html>