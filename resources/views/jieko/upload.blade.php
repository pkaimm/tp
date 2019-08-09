<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>素材</title>
</head>
<body>
<form action="{{url('/jieko/do_upload')}}" method="post" enctype="multipart/form-data">
    @csrf
    选择：<select name="up_type" id="">
        <option value="1">临时</option>
        <option value="2">永久</option>
    </select>
    <p>上传图片：<input type="file" name="image" id=""></p>
    <p>上传视频：<input type="file" name="video" id=""></p>
    <p>上传音频：<input type="file" name="voice" id=""></p>
    <p>上传缩略图：<input type="file" name="thumb" id=""></p>
    <input type="submit">
</form>
</body>
</html>

