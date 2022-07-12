<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="{{url('/public/sistema/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/public/sistema/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('/public/sistema/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{url('/public/sistema/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{url('/public/sistema/assets/css/apexcharts.css')}}">
    <link rel="stylesheet" href="{{url('/public/sistema/assets/css/slick-theme.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="row">
        <div class="col-md-2 div_imagem_logotipo">
            <a href="#" class="text-dark">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <img class="img-fluid" src="https://img.freepik.com/vetores-gratis/modelo-de-logotipo-da-marca-coyote_23-2149207680.jpg?w=740" alt="">
                    </div>
                    <div class="col-md-7">
                        <p class="m-0"><b>blingers</b><br />analytics</p>
                    </div>
                </div>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-md-5 pl-0">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav menu_dashboards">
                    <li class="nav-item px-2 botao_verde_contorno mr-1 rounded active">
                        <a class="nav-link p-0" href="#">Home</a>
                    </li>
                    <li class="nav-item px-2 botao_verde_contorno mx-1 rounded">
                        <a class="nav-link p-0" href="#">Marketplace</a>
                    </li>
                    <li class="nav-item px-2 botao_verde_contorno mx-1 rounded">
                        <a class="nav-link p-0" href="#">Vendas</a>
                    </li>
                    <li class="nav-item px-2 botao_verde_contorno mx-1 rounded">
                        <a class="nav-link p-0" href="#">Clientes</a>
                    </li>
                    <li class="nav-item px-2 botao_verde_contorno mx-1 rounded">
                        <a class="nav-link p-0" href="#">Estoque</a>
                    </li>
                    <li class="nav-item px-2 botao_verde_contorno mx-1 rounded">
                        <a class="nav-link p-0" href="#">Financeiro</a>
                    </li>
                </ul>
            </div>
            <div class="">
                <span class="">
                    <i class="fa-solid fa-arrows-rotate icone_atualizado_menu_dashboards"></i>
                    11/05/2022 01:37:31
                </span>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-3">
                    <label for="status">Status</label>
                    <div class="multiselect">
                        <div class="selectBox" onclick="showCheckboxes(1)">
                            <select>
                                <option>Selecionar</option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div class="checkboxes" id="checkboxes1">
                            <label ><input type="checkbox" value="1"/>Status 1</label>
                            <label ><input type="checkbox" value="2"/>Status 2</label>
                            <label ><input type="checkbox" value="3"/>Status 3</label>
                            <label ><input type="checkbox" value="4"/>Status 4</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="status">Ano</label>
                    <div class="multiselect">
                        <div class="selectBox" onclick="showCheckboxes(2)">
                            <select>
                                <option>Selecionar</option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div class="checkboxes" id="checkboxes2">
                            <label ><input type="checkbox" value="1"/>2018</label>
                            <label ><input type="checkbox" value="2"/>2019</label>
                            <label ><input type="checkbox" value="3"/>2020</label>
                            <label ><input type="checkbox" value="4"/>2021</label>
                            <label ><input type="checkbox" value="5"/>2022</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="status">Mês</label>
                    <div class="multiselect">
                        <div class="selectBox" onclick="showCheckboxes(3)">
                            <select>
                                <option>Selecionar</option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div class="checkboxes" id="checkboxes3">
                            <label ><input type="checkbox" value="1"/>Janeiro</label>
                            <label ><input type="checkbox" value="2"/>Fevereiro</label>
                            <label ><input type="checkbox" value="3"/>Março</label>
                            <label ><input type="checkbox" value="4"/>Abril</label>
                            <label ><input type="checkbox" value="5"/>Maio</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="amount">Dia: </label>
                    <input type="text" class="text-left" id="amount" readonly style="border:0; background: transparent; max-width: 60px;">
                    <div id="slider-range" class="mt-2"></div>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="container-fluid bg-light py-4">
    <div class="row">
        <div class="col">
            <div class="card_estatistica_menu_dashboard">
                <h5>Faturamento</h5>
                <p class="">
                    R$2,10 Mi
                </p>
            </div>
        </div>
        <div class="col">
            <div class="card_estatistica_menu_dashboard">
                <h5>N° de vendas</h5>
                <p class="">
                    13 Mil
                </p>
            </div>
        </div>
        <div class="col">
            <div class="card_estatistica_menu_dashboard">
                <h5>Custo</h5>
                <p class="">
                    R$1,22 Mi
                </p>
            </div>
        </div>
        <div class="col">
            <div class="card_estatistica_menu_dashboard">
                <h5>Frete</h5>
                <p class="">
                    R$45,72 Mil
                </p>
            </div>
        </div>
        <div class="col">
            <div class="card_estatistica_menu_dashboard">
                <h5>Margem</h5>
                <p class="">
                    R$845,19 Mil
                </p>
            </div>
        </div>
        <div class="col">
            <div class="card_estatistica_menu_dashboard">
                <h5>Margem</h5>
                <p class="">
                    40,2%
                </p>
            </div>
        </div>
        <div class="col">
            <div class="card_estatistica_menu_dashboard">
                <h5>Total Médio</h5>
                <p class="">
                    R$160,51
                </p>
            </div>
        </div>
        <div class="col">
            <div class="card_estatistica_menu_dashboard">
                <h5>Itens Vendidos</h5>
                <p class="">
                    16 Mil
                </p>
            </div>
        </div>
        <div class="col">
            <div class="card_estatistica_menu_dashboard">
                <h5>Itens/ Pedido</h5>
                <p class="">
                    1,2
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        @yield('conteudo')
    </div>
</div>
</body>
<script type="text/javascript" src="{{url('/public/sistema/assets/js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{url('/public/sistema/assets/js/apexcharts.js')}}"></script>
<script type="text/javascript" src="{{url('/public/sistema/assets/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{url('/public/sistema/assets/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{url('/public/sistema/assets/js/slick.js')}}"></script>
@yield('js')
<script>
    $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 1,
            max: 31,
            values: [ 1, 31 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
            " - " + $( "#slider-range" ).slider( "values", 1 ) );
    } );
</script>
</html>
