<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>广播系统</title>
        <style>

        </style>
    </head>
    <body>
        <h1>test</h1>
    </body>
</html>
<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>

<script src="/js/app.js"></script>

{{--<script src="host(你的域名):6001/socket.io/socket.io.js"></script>--}}
<script>
    // <!--上面app.js已经进行了Echo的实例化，然后应该使用实例化的Echo进行广播事件的监听-->
    console.log(Echo);

    //公共频道
    Echo.channel('pushMessage')
        .listen('PublicMessageEvent', (e) => {
            console.log(e);
            alert(e.message)
        });


    //私有频道
    // 后面拼接得按说是 用户id 用来标识私有广播得。 现在暂且用 1
    // Echo.private('private-user-id' + 1)
    //     .listen('PrivateMessageEvent', (e) => {
    //         console.log(e);
    //         alert(e.message)
    //     });
</script>
