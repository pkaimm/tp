<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加车库门卫</title>
</head>
<body>
<form action="{{url('/cheku/ckmwcl')}}" method="post">
    @csrf
    <table>
        <h3>添加车库门卫</h3>
        <tr>
            <td>添加门卫：<input type="text" name="user"></td>
        </tr>
        <tr>
            <td><input type="submit" value="添加"></td>
        </tr>
    </table>
</form>
</body>
</html>