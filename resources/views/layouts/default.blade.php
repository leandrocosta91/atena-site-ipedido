<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ipedido</title>
    <link type="text/css" rel="stylesheet" href="/css/app.css"/>
    <link type="text/css" rel="stylesheet" href="/css/custom.css"/>
    <link type="text/css" rel="stylesheet" href="/css/jquery-ui-1.12.1.custom.css" />
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/js/pedidos.js"></script>
</head>
<body>
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{Session::get('message')}}
        </div>
        @endif
        @yield('content')
    </div>
</body>
</html>