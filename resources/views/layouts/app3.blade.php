<html>
<head>
    <title>Todo List</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    @yield('uploadstyle')
</head>
<body>

    <div align="center" style="margin-top: 50px;">
        @yield('content')
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    @yield('uploadscript')

</body>
</html>