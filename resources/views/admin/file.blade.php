<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文件上传</title>
</head>
<body>
        <form action="{{url('admin/dofile')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">
            <input type="submit" value="上传">
        </form>
</body>
</html>