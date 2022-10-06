@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')

    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
        <div class="row match-height">
        </div>

        <div class="row match-height">
            <div class="col-lg-30 col-12">
                <div class="row match-height">
                    <!-- Bar Chart - Orders -->
                    <div class="col-xl-8 col-md-6 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">Estatísticas</h4>
                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="gitlab" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">
                                                  {{ $resume_animal->ativos + $resume_animal->inativos}}
                                                </h4>
                                                <p class="card-text font-small-3 mb-0">Animais</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="disc" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">13222 Kg</h4>
                                                <p class="card-text font-small-3 mb-0">Peso Médio do Rebanho</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="sunset" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{ $resume_pastagem->ativos + $resume_fornecedor->inativos}}</h4>
                                                <p class="card-text font-small-3 mb-0">Pastagens</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="slack" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">  {{ $resume_area->ativos + $resume_area->inativos}}</h4>
                                                <p class="card-text font-small-3 mb-0">Áreas</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="feather" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">
                                                  {{ $resume_cultura->ativos + $resume_cultura->inativos}}
                                                </h4>
                                                <p class="card-text font-small-3 mb-0">Culturas</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="thermometer" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{ $resume_tanque->ativos + $resume_tanque->inativos}}</h4>
                                                <p class="card-text font-small-3 mb-0">Tanques</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="truck" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{ $resume_fornecedor->ativos + $resume_fornecedor->inativos}}</h4>
                                                <p class="card-text font-small-3 mb-0">Fornecedores</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="grid" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{ $resume_lote->ativos + $resume_lote->inativos}}</h4>
                                                <p class="card-text font-small-3 mb-0">Lotes</p>
                                            </div>
                                        </div>
                                    </div>

                        </div>
                    </div>
                </div>
            </div> 
            <!--/ Statistics Card -->



            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    // Exemplo de requisição GET
                    var ajax = new XMLHttpRequest();
                    var raca1 = 'ANGUS';
                    // Seta tipo de requisição e URL com os parâmetros
                    ajax.open("GET", "http://127.0.0.1:8000/api/getAnimaisRaca/"+ raca1, true);

                    // Envia a requisição
                    ajax.send();

                    // Cria um evento para receber o retorno.
                    ajax.onreadystatechange = function() {

                        // Caso o state seja 4 e o http.status for 200, é porque a requisiçõe deu certo.
                        if (ajax.readyState == 4 && ajax.status == 200) {

                            var data = ajax.responseText;

                            // Retorno do Ajax
                            //console.log(data);

                            var qtdRacas = data;

                            //console.log(qtdRacas);

                            var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                [raca1, parseInt(qtdRacas)],
                                ['Anelorado', 1]
                            ]);

                            var options = {
                                title: 'Quantidade de animais por raça'
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                        }
                    }
                }
            </script>
            </head>

            <body>
                <div id="piechart" style="width: 900px; height: 500px;"></div>
            </body>

            <!-- Bar Chart - Orders -->

            <!--/ Bar Chart - Orders -->

        <!-- Line Chart - Profit -->
        <div class="col-lg-6 col-md-3 col-6">
          <div class="card card-tiny-line-stats">
            <div class="card-body pb-50">
              <h6>Profit</h6>
              <h2 class="font-weight-bolder mb-1">6,24k</h2>
              <div id="statistics-profit-chart"></div>
            </div>
          </div>
        </div>
        <!--/ Line Chart - Profit -->

            <!-- Earnings Card -->

            <!--/ Earnings Card -->


            <!-- Revenue Report Card -->

            <!--/ Revenue Report Card -->

    </section>
    <!-- Dashboard Ecommerce ends -->
@endsection



@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>

@endsection
@section('page-script')
      {{-- Page js files --}}
      <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
@endsection
