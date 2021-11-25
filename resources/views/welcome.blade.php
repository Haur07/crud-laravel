<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="https://static.thenounproject.com/png/63276-200.png" type="image/x-icon">
        <title>Don't Put Off! - Agenda</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background: url(https://i2.wp.com/planosdesauderms.com.br/wp-content/uploads/2018/01/background-clean.jpg) no-repeat center fixed;
                background-size: 120em 65em;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }

            .links_bg {
                background-color: #e7fff1;
                border-radius: 10px;
            }

            .links > a {
                color: #757575;
                padding: 10px 25px 10px 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .img {
                opacity: 30%;
                width: 7em;
                height: 7em;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            @if (Route::has('login') && Auth::check())
                <div class="top-right links">
                    <a class="links_bg" href="#" onclick="btn_action();">Home</a>
                </div>
            @elseif (Route::has('login') && !Auth::check())
                <div class="top-right links">
                    <a class="links_bg" href="{{ url('/login') }}">Login</a>
                    <a class="links_bg" href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <img class="img" src="https://static.thenounproject.com/png/63276-200.png" alt="agenda_logo">
                <div class="title m-b-md">
                    Don't Put Off!
                </div>

                <div class="links_bg">
                    <div class="links">
                            <a href="{{ url('/home') }}">Agenda</a>
                            <a href="#" onclick="btn_action();">Blog</a>
                            <a href="#" onclick="btn_action();">Dúvidas frequentes</a>
                            <a href="#" onclick="btn_action();">Contatos</a>
                            <a href="#" onclick="btn_action();">Sobre</a>
                            <a href="#" onclick="btn_action();">Outros sites</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function btn_action() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Conteúdo não disponível no momento',
                    text: 'Por favor, tente novamente mais tarde.',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        </script>
    </body>
</html>
