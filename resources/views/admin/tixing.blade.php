<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>选择题型</title>
</head>
<body>
<form action="{{url('/admin/danxuan')}}">
    <table>
       选择提型： <select name="a" >
                    <option >请选择</option>
                    <option name="1" value="1">单选</option>
                    <option name="2" value="2">复选</option>
                    <option name="3" value="3">判断</option>
        </select>
        <tr>
            <td><input type="submit" value="确定"></td>
        </tr>
    </table>
</form>
</body>
</html>