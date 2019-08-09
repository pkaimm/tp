<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加调研</title>
</head>
<body>
<form action="{{url('/admin/ksaindex')}}" method="post">
    @csrf
    <table>
        <tr>
            <td>
                调研项目：<input type="text" name="biaoti" value="php常用技术调研">
            </td>
            <td><input type="submit" value="添加调研"></td>
        </tr>
    </table>
</form>
</body>
</html>