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
        <form action="{{url('wechat/save_tag')}}" method="post">
            @csrf
            标签名： <input type="text" name="name" id=""><p>
                <input type="submit">
        </form>
</body>
</html>
