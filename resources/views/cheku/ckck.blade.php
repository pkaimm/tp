<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>车辆出库</title>
</head>
<body>
<form action="{{url('/cheku/ckckcl')}}" method="post">
    @csrf
    <table>
        <h3>车辆出库</h3>
        <tr>
            <td>车牌号: <input type="text" name="chepaihao"></td>
        </tr>
        <tr>
            <td><input type="submit" value="车辆出库"></td>
        </tr>
    </table>
</form>
</body>
</html>