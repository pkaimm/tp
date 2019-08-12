<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
            <form action="{{url('wechat/update_tag')}}" method="post">
                <h1>修改标签</h1>
                <input type="hidden" name="id" value="{{$data['id']}}">
                @csrf
                <h3>【{{$data['name']}}】 :修改为：<input type="text" name="name"></h3>
                <input type="submit" value="修改">
            </form>
</body>
</html>

