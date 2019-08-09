<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>门卫系统</title>
</head>
<body>
<form action="">
    <table>
        <h3>车库管理系统</h3>
            <tr>
                <td>小区车位:{{$data->sum}}  &ensp;&ensp;&ensp;&ensp;</td>
                <td>
                    @if($data->shengyu>0)
                       剩余车位： {{$data->shengyu}}  &ensp;&ensp;&ensp;&ensp;
                    @else
                        已经停满
                    @endif
                </td>
            </tr>
            <tr>
                <td><a href="{{url('/cheku/ckrk')}}">车辆入库</a></td>
                <td><a href="{{url('/cheku/ckck')}}">车辆出库</a></td>
            </tr>
    </table>
</form>
</body>
</html>