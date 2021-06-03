@extends('layouts.app')

@section('page-css')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-9 main-chart">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/xGIPwfhW6Mk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <!--CUSTOM CHART START -->
            {{-- <div class="border-head">
                <h3>TOTAL DE VOLTAS POR DIA</h3>
            </div>
            <div class="custom-bar-chart">
                <ul class="y-axis">
                <li><span>50</span></li>
                <li><span>40</span></li>
                <li><span>30</span></li>
                <li><span>20</span></li>
                <li><span>10</span></li>
                <li><span>0</span></li>
                </ul>
            </div>
            <div class="bar">
                <div class="title">03/06</div>
                <div class="value tooltips" data-original-title="0" data-toggle="tooltip" data-placement="top">0%</div>
            </div> --}}

            <!--custom chart end-->
            <div class="row mt">
                <!-- SERVER STATUS PANELS -->
                {{-- <div class="col-md-4 col-sm-4 mb">
                    <div class="grey-panel pn donut-chart">
                        <div class="grey-header">
                        <h5>SERVER LOAD</h5>
                        </div>
                        <canvas id="serverstatus01" height="120" width="120"></canvas>
                        <script>
                        var doughnutData = [{
                            value: 70,
                            color: "#FF6B6B"
                            },
                            {
                            value: 30,
                            color: "#fdfdfd"
                            }
                        ];
                        var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                        </script>
                        <div class="row">
                        <div class="col-sm-6 col-xs-6 goleft">
                            <p>Usage<br/>Increase:</p>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <h2>21%</h2>
                        </div>
                        </div>
                    </div>
                    <!-- /grey-panel -->
                </div> --}}
                <!-- /col-md-4-->
                <div class="col-md-4 col-sm-4 mb">
                    <div class="darkblue-panel pn">
                        <div class="darkblue-header">
                        <h5>TOTAL DE VOLTAS POR SEXO</h5>
                        </div>
                        <canvas id="serverstatus02" height="120" width="120"></canvas>
                        <script>
                        var doughnutData = [{
                            value: 60,
                            color: "#1c9ca7"
                            },
                            {
                            value: 40,
                            color: "#f68275"
                            }
                        ];
                        var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                        </script>
                        <p></p>
                        <footer>
                        <div class="pull-left">
                            <h5><i class="fa fa-hdd-o"></i> ... </h5>
                        </div>
                        <div class="pull-right">
                            <h5>Em breve</h5>
                        </div>
                        </footer>
                    </div>
                    <!--  /darkblue panel -->
                </div>
                <!-- /col-md-4 -->
                {{-- <div class="col-md-4 col-sm-4 mb">
                <!-- REVENUE PANEL -->
                    <div class="green-panel pn">
                        <div class="green-header">
                        <h5>VOLTAS POR DIA</h5>
                        </div>
                        <div class="chart mt">
                        <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
                        </div>
                        <p class="mt"><b> X </b><br/>Voltas realizadas</p>
                    </div>
                </div> --}}
                <!-- /col-md-4 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /col-md-9 -->

        <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
                <h4>TOTAL DE VOLTAS REALIZADAS</h4>
                <canvas id="newchart" height="130" width="130"></canvas>
                <script>
                var doughnutData = [{
                    value: 70,
                    color: "#4ECDC4"
                    },
                    {
                    value: 30,
                    color: "#fdfdfd"
                    }
                ];
                var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
                </script>
            </div>
            <!--NEW EARNING STATS -->
            <div class="panel terques-chart">
                <div class="panel-body">
                <div class="chart">
                    <div class="centered">
                    <span>VOLTAS POR DIA</span>
                    <strong>em breve</strong>
                    </div>
                    <br>
                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                </div>
                </div>
            </div>
            <!--new earning end-->
            <!-- RECENT ACTIVITIES SECTION -->
            <h4 class="centered mt mb">ATIVIDADES RECENTES</h4>
            <!-- First Activity -->
            <div class="desc">
                <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                </div>
                <div class="details">
                <p>
                    <muted>Agora</muted>
                    <br/>
                    <a href="#">Bike Park GK</a> realizou 5 voltas.<br/>
                </p>
                </div>
            </div>
        </div>
        <!-- /col-md-3 -->
    </div>
    <!-- /row -->

    @include('faq')
@endsection

@push('custom-scripts')
    <script src="{{ asset('Dashio/lib/sparkline-chart.js') }}"></script>
    <script src="{{ asset('Dashio/lib/chart-master/Chart.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Bem Vindo!',
            // (string | mandatory) the text inside the notification
            text: 'Garanta já sua inscrição no desafio Local Legend Bike Park GK. </br> Ao longos próximos dias serão colocadas novidades no site.',
            // (string | optional) the image to display on the left
            image: 'img/logo.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: 8000,
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
    </script>
    <script type="application/javascript">
        $(document).ready(function() {
        $("#date-popover").popover({
            html: true,
            trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
            $(this).hide();
        });

        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
        });
    </script>
@endpush