<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{url('/public/painel/assets/css/style.css')}}">
{{--    <link rel="stylesheet" href="{{url('/public/sistema/assets/css/bootstrap.css')}}">--}}

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Soulog Painel - Projeto BI</title>
</head>
<body>
<nav class="sidebar close">
    <header>
        <div class="image-text">
                <span class="image">
                    <img src="{{url('/public/painel/assets/images/logo.png')}}" alt="">
                </span>

            <div class="text logo-text">
                <span class="name">Soulog Painel</span>
                <span class="profession">Projeto BI</span>
            </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">

            {{--                <li class="search-box">--}}
            {{--                    <i class='bx bx-search icon'></i>--}}
            {{--                    <input type="text" placeholder="Search...">--}}
            {{--                </li>--}}

            <ul class="menu-links">
                <li class="nav-link">
                    <a href="{{route('dash.home')}}">
                        <i class='bx bx-home-alt icon' ></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="{{route('createEmpresa.painel')}}">
                        <i class='bx bx-briefcase-alt icon'></i>
                        <span class="text nav-text">Nova Empresa</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="{{route('listEmpresa.painel')}}">
                        <i class='bx bx-briefcase-alt-2 icon'></i>
                        <span class="text nav-text">Listar Empresas</span>
                    </a>
                </li>

                <li class="nav-link" >
                    <a href="{{route('createUsuario.painel')}}">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Novo Usuário</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="{{route('listUsuario.painel')}}">
                        <i class='bx bxs-user-detail icon' ></i>
                        <span class="text nav-text">Listar Usuários</span>
                    </a>
                </li>

                {{--                    <li class="nav-link">--}}
                {{--                        <a href="#">--}}
                {{--                            <i class='bx bx-bar-chart-alt-2 icon' ></i>--}}
                {{--                            <span class="text nav-text">Revenue</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}

                {{--                    <li class="nav-link">--}}
                {{--                        <a href="#">--}}
                {{--                            <i class='bx bx-bell icon'></i>--}}
                {{--                            <span class="text nav-text">Notifications</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}

                {{--                    <li class="nav-link">--}}
                {{--                        <a href="#">--}}
                {{--                            <i class='bx bx-pie-chart-alt icon' ></i>--}}
                {{--                            <span class="text nav-text">Analytics</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}

                {{--                    <li class="nav-link">--}}
                {{--                        <a href="#">--}}
                {{--                            <i class='bx bx-heart icon' ></i>--}}
                {{--                            <span class="text nav-text">Likes</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}

                {{--                    <li class="nav-link">--}}
                {{--                        <a href="#">--}}
                {{--                            <i class='bx bx-wallet icon' ></i>--}}
                {{--                            <span class="text nav-text">Wallets</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="{{route('logout.user')}}">
                    <i class='bx bx-log-out icon' ></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>

        </div>
    </div>

</nav>

<section class="home">
    <div class="content-dash">
        @yield('conteudo')
    </div>
</section>


<script src="{{url('/public/painel/assets/js/script.js')}}"></script>

</body>
</html>
