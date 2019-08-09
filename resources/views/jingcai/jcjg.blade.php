<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台竞猜结果</title>
</head>
<body>
<form action="">
    <table>
        <h3>竞猜结果</h3>
        <tr>
            <td>你的竞猜：{{$data->name}}{{$data->type}}{{$data->cname}}</td>
        </tr>
        <tr>
            <td>
                @if($data->type==$data->type)
                    结果：恭喜你，猜中了
                @else
                    结果： 很抱歉，没猜中
                @endif
            </td>
        </tr>

    </table>
</form>
</body>
</html>