<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PROJETO</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-4">

                <div class="text-center">

                    <a href="{{ route('login') }}">
                        <img alt="Directus" src="{{asset('assets/img/logoForm.png')}}" />
                    </a>

                </div>
                <br>
                <div class="text-center">
                    <p class="text-center">
                    Programa de teste
                    </p>
                </div>

            </div>
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-8">
                <strong>&copy; 2020 NOME - DESCRICAO</strong> - Todos os direitos reservados.
            </div>
            <div class="col-md-4 text-right">
                <strong>Versão </strong> 0.0
            </div>
        </div>
    </div>

</body>

</html>