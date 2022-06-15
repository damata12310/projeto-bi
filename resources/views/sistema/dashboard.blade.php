@extends('sistema.theme')
@section('conteudo')
<div class="row mt-4">
    <div class="col-md-5">
        <div class="div_containers_itens_dashboard ">
            <h5>Análise por Marketplace</h5>
            <div class="tabela_dashboard">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Loja</th>
                        <th scope="col">Faturamento</th>
                        <th scope="col">Vendas</th>
                        <th scope="col">Ticket Medio</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Mercado Livre</td>
                        <td>R$1.094.320,22</td>
                        <td>5.204</td>
                        <td>R$210,28</td>
                    </tr>
                    <tr>
                        <td>Shopee</td>
                        <td>R$248.966,88</td>
                        <td>3.435</td>
                        <td>R$72,48</td>
                    </tr>
                    <tr>
                        <td>Olist</td>
                        <td>R$233.909,28</td>
                        <td>1.651</td>
                        <td>R$141,68</td>
                    </tr>
                    <tr>
                        <td>B2W</td>
                        <td>R$157.974,24</td>
                        <td>765</td>
                        <td>R$206,50</td>
                    </tr>
                    <tr>
                        <td>Magalu</td>
                        <td>R$135.081,92</td>
                        <td>663</td>
                        <td>R$203,74</td>
                    </tr>
                    <tr>
                        <td>Tray</td>
                        <td>R$59.354,15</td>
                        <td>349</td>
                        <td>R$170,07</td>
                    </tr>
                    <tr>
                        <td>Amazon</td>
                        <td>R$56.730,96</td>
                        <td>381</td>
                        <td>R$148,90</td>
                    </tr>
                    <tr>
                        <td>Mercado Livre</td>
                        <td>R$1.094.320,22</td>
                        <td>5.204</td>
                        <td>R$210,28</td>
                    </tr>
                    <tr>
                        <td>Shopee</td>
                        <td>R$248.966,88</td>
                        <td>3.435</td>
                        <td>R$72,48</td>
                    </tr>
                    <tr>
                        <td>Olist</td>
                        <td>R$233.909,28</td>
                        <td>1.651</td>
                        <td>R$141,68</td>
                    </tr>
                    <tr>
                        <td>B2W</td>
                        <td>R$157.974,24</td>
                        <td>765</td>
                        <td>R$206,50</td>
                    </tr>
                    <tr>
                        <td>Magalu</td>
                        <td>R$135.081,92</td>
                        <td>663</td>
                        <td>R$203,74</td>
                    </tr>
                    <tr>
                        <td>Tray</td>
                        <td>R$59.354,15</td>
                        <td>349</td>
                        <td>R$170,07</td>
                    </tr>
                    <tr>
                        <td>Amazon</td>
                        <td>R$56.730,96</td>
                        <td>381</td>
                        <td>R$148,90</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="div_containers_itens_dashboard ">
            <h5>Faturamento (R$) por Ano e Mês</h5>
            <div class="" id="chart">
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <div class="div_containers_itens_dashboard ">
            <h5>Faturamento (R$) por Categoria</h5>
            <div class="" id="chartBar">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="div_containers_itens_dashboard ">
            <h5>Faturamento (R$) por Loja</h5>
            <div class="" id="chartPie">
            </div>
        </div>
    </div>
</div>
<script>
    var options = {
        series: [
            {
                name: "Mercado Livre",
                data: [13584, 72250, 66591, 96397, 142070, 113913, 70299]
            },
            {
                name: "Shopee",
                data: [5152, 22669, 52139, 76300, 100239, 98302, 140321]
            }
        ],
        chart: {
            height: 350,
            type: 'line',
            dropShadow: {
                enabled: true,
                color: '#000',
                top: 18,
                left: 0,
                blur: 10,
                opacity: 0.2
            },
            toolbar: {
                show: true
            }
        },
        colors: ['#77B6EA', '#18cc7e'],
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                return "R$ " + val.toFixed(2).replace('.', ',')
            },
        },
        stroke: {
            curve: 'smooth'
        },
        grid: {
            borderColor: '#e7e7e7',
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        markers: {
            size: 1
        },
        xaxis: {
            categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul'],
            title: {
                text: 'Mês'
            }
        },
        yaxis: {
            title: {
                text: 'Faturamento (R$)'
            },
            min: 0,
            max: 200000
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            floating: true,
            offsetY: -25,
            offsetX: -5
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
<script>
    var options = {
        series: [{
            name: ["R$"],
            data: [371930, 184715, 161485, 106444, 102924, 100877, 98721, 76395, 75676, 70070]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        colors: ['#18cc7e', '#18cc7e', '#18cc7e', '#18cc7e', '#18cc7e', '#18cc7e', '#18cc7e', '#18cc7e',
            '#18cc7e', '#18cc7e'
        ],
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                return "R$ " + val.toFixed(2).replace('.', ',')
            },
        },
        tooltip: {
            enabled: false
        },
        xaxis: {
            categories: ['Politriz', 'Gabarito Marcenaria', 'Lixadeiras', 'Disco de Lixa', 'Gabarito', 'Laminas de Serra', 'Vulcanizador de P...',
                'Alicate Hidráulico', 'Grampo Sargento', 'Fresas'
            ],
        }
    };

    var chart = new ApexCharts(document.querySelector("#chartBar"), options);
    chart.render();
</script>
<script>
    var options = {
        labels: ['AliExpress', 'Loja Integrada', 'Magalu', 'Mercado Livre', 'Mercado Shops', 'Olist', 'Shopee', 'Tray'],
        series: [.75, 2.49, 6.42, 52, .23, 11.11, 11.83, 15.17],
        chart: {
            type: 'donut',
            height: 363
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val.toFixed(2).replace('.', ',') + "%"
            },
        },
        tooltip: {
            enabled: true,
            formatter: function (val) {
                return val.toFixed(2).replace('.', ',') + "%"
            },
        },
        colors:['#ff0000', '#9999ff', '#0000ff', '#ffff00', '#00ffff', '#00ff00', '#000000', '#ff00ff'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chartPie"), options);
    chart.render();

</script>
<script>
    var expanded = false;
    function showCheckboxes(numero)
    {
        var checkboxes = document.getElementById("checkboxes"+numero);
        if(!expanded)
        {
            checkboxes.style.display = "block";
            expanded = true;
        }
        else
        {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }

</script>
@stop
