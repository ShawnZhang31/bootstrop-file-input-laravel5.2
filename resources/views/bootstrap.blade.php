<!DOCTYPE html>
<!-- release v4.3.2, copyright 2014 - 2015 Kartik Visweswaran -->
<html lang="zh">
<head>
    <meta charset="UTF-8"/>
    <title>Bootstrap File Input</title>
    <link href="{{asset(url('Libraries/bootstrap/css/bootstrap.min.css'))}}" rel="stylesheet">
    <script src="{{asset(url('Libraries/jQuery/jquery-3.0.0.min.js'))}}"></script>
    <link href="{{asset(url('Libraries/bootstrap file input/css/fileinput.min.css'))}}" media="all" rel="stylesheet" type="text/css" />
    {{--如果再上传图片前需要对图片进行缩放处理，则比句在fileinput.min.js前引入--}}
    <script src="{{asset(url('Libraries/bootstrap file input/js/plugins/canvas-to-blob.min.js'))}}" type="text/javascript"></script>
    {{--如果想对上产的图片进行排序处理，则比句在fileinput.min.js前引入--}}
    <script src="{{asset(url('Libraries/bootstrap file input/js/plugins/sortable.min.js'))}}" type="text/javascript"></script>
    {{--如果想使用纯净的html环境，则比句在fileinput.min.js前引入--}}
    <script src="{{asset(url('Libraries/bootstrap file input/js/plugins/purify.min.js'))}}" type="text/javascript"></script>
    {{--bootstrap输入插件--}}
    <script src="{{asset(url('Libraries/bootstrap file input/js/fileinput.min.js'))}}" type="text/javascript"></script>
    {{--如果需要在一个大的模式对话框中使用缩放预览，则需要引入--}}
    <script src="{{asset(url('Libraries/bootstrap/js/bootstrap.min.js'))}}" type="text/javascript"></script>
    {{--如果要使用帅气的类似于font awesome的样式，则需要引入--}}
    <script src="{{asset(url('Libraries/bootstrap file input/themes/fa/fa.js'))}}" type="text/javascript"></script>
    {{--语言包--}}
    <script src="{{asset(url('Libraries/bootstrap file input/js/locales/zh.js'))}}" type="text/javascript"></script>
</head>

<body>

<input id="input-zh" name="images" type="file" multiple class="file-loading">
<script>
    $("#input-zh").fileinput({
        showCaption:true, //是否显示标题

        language: "zh", //语言包
        uploadUrl: "{{url('/image/up')}}",  //上传文件的路径
        uploadAsync:true,   //使用Ajax进行异步上传
        minFileCount:1, // 最小的问卷数量
        maxFileCount:5, //最大的文件数量
        allowedFileExtensions: ["jpg","jpeg", "png"],   //支持的图片格式
        maxFileSize:10240,  //最大文件不超过10M
        //上传文件的时的token
        uploadExtraData: {
            _token:"{{ csrf_token() }}"
        },
        //上传文件时的token
        deleteExtraData:{
            _token:"{{ csrf_token() }}"
        },
        //使用数据来初始化预览视图
        initialPreviewAsData: true,
    });
</script>
</body>
</html>