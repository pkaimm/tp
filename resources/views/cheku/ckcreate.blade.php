<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>车位添加</title>
</head>
<body>
<form action="{{url('/cheku/cksave')}}" method="post">
    @csrf
    <table>

            <h3>车位添加</h3>

        <tr>
            <td>车位添加：<input type="text" name="sum"></td>
        </tr>
        <tr>
            <td><input type="submit" value="添加"></td>
        </tr>
    </table>
</form>
</body>
</html>