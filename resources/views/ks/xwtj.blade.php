<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新闻添加</title>
</head>
<body>
    <form action="{{url('/ks/do')}}" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>新闻标题：<input type="text" name="biaoti"></td>
            </tr>
            <tr>
                <td>新闻图片：<input type="file" name="pic"></td>
            </tr>
            <tr>
                <td>新闻作者：<input type="text" name="zuoze"></td>
            </tr>
            <tr>
                <td><input type="submit" value="新闻添加"></td>
            </tr>
        </table>
    </form>
</body>
</html>