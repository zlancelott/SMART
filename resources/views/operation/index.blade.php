@extends('adminlte::page')

@section('title')

@section('content')
    <div class="row">
        @forelse ($stations as $station)

            @if ($station->type == config('stations.oven'))
                <div class="col-md-8">
                    <div class="box box-default no-padding" id="station{{ $station->id }}">
                        <!-- /.box-header -->
                        <div class="box-body station">
                            <div class="col-md-12">
                                <div class="box box-widget widget-user-2">
                                    <div class="widget-user-header bg-gray">
                                        <h4>{{ $station->name }}</h4>
                                    </div>
                                    <div class="col-md-3 no-padding">
                                        <div class="box-footer no-padding">
                                            <ul class="nav nav-stacked">
                                                <li id="serial{{ $station->id }}"><a href="#">Serial <span class="pull-right badge bg-gray"></span></a></li>
                                                <li id="dataEntrada{{ $station->id }}"><a href="#">Data entrada<span class="pull-right badge bg-gray"></span></a></li>
                                                <li id="dataSaida{{ $station->id }}"><a href="#">Data saída<span class="pull-right badge bg-gray"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="box-footer no-padding">
                                            <div class="box box-solid">
                                                <div class="box-body">
                                                    <h4 class="zonas">
                                                        SP / PV - SUPERIOR / INFERIOR
                                                    </h4>
                                                    <div class="row" style="margin-left: 0px">
                                                        @for ($i = 0; $i < $station->number_zones; $i++)
                                                            <div class="col-xs-1">
                                                                <input class="form-control input-sm estacao{{ $station->id . $i }}" type="text" readonly style="padding: 0px; text-align: center">
                                                            </div>
                                                        @endfor
                                                    </div>
                                                    <div class="row" style="margin-top: 4px; margin-left: 0px">
                                                        @for ($i = 0; $i < $station->number_zones; $i++)
                                                            <div class="col-xs-1">
                                                                <input class="form-control input-sm estacao{{ $station->id . $i }}" type="text" readonly style="padding: 0px; text-align: center">
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer no-padding">
                                            <div class="box box-solid">
                                                <div class="box-body">
                                                    <div class="row" style="margin-left: 0px">
                                                        @for ($i = 0; $i < $station->number_zones; $i++)
                                                            <div class="col-xs-1">
                                                                <input class="form-control input-sm estacao{{ $station->id . $i }}" type="text" readonly style="padding: 0px; text-align: center">
                                                            </div>
                                                        @endfor
                                                    </div>
                                                    <div class="row" style="margin-top: 4px; margin-left: 0px">
                                                        @for ($i = 0; $i < $station->number_zones; $i++)
                                                            <div class="col-xs-1">
                                                                <input class="form-control input-sm estacao{{ $station->id . $i }}" type="text" readonly style="padding: 0px; text-align: center">
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <script>
                    $(function () {

                        setData(
                                {{ $station->id }}, $('#serial{{ $station->id }} span'), 
                                $('#dataEntrada{{ $station->id }} span'), $('#dataSaida{{ $station->id }} span'), 
                                {{ $station->number_zones }})

                        setInterval(() =>

                            setData(
                                {{ $station->id }}, $('#serial{{ $station->id }} span'), 
                                $('#dataEntrada{{ $station->id }} span'), $('#dataSaida{{ $station->id }} span'), 
                                {{ $station->number_zones }}), 1000)

                    });
                </script>
            @else
                <div class="col-md-4">
                    <div class="box box-default no-padding" id="station{{ $station->id }}">
                        <!-- /.box-header -->
                        <div class="box-body station">
                            <div class="col-md-12">
                                <div class="box box-widget widget-user-2">
                                    <div class="widget-user-header bg-gray">
                                        <h4>{{ $station->name }}</h4>
                                    </div>
                                    <div class="col-md-12 no-padding">
                                        <div class="box-footer no-padding">
                                            <ul class="nav nav-stacked">
                                                <li id="serial{{ $station->id }}"><a href="#">Serial <span class="pull-right badge bg-gray"></span></a></li>
                                                <li id="dataEntrada{{ $station->id }}"><a href="#">Data entrada<span class="pull-right badge bg-gray">{{ $station->created_at }}</span></a></li>
                                                <li id="dataSaida{{ $station->id }}"><a href="#">Data saída<span class="pull-right badge bg-gray"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <script>
                    $(function () {
                        getData(
                            {{ $station->id }}, 
                            $('#serial{{ $station->id }} span'), 
                            $('#dataEntrada{{ $station->id }} span'), 
                            $('#dataSaida{{ $station->id }} span')
                        );
                    });
                </script>
            @endif

        @empty
            <h1>Nenhuma estação cadastrada</h1>
        @endforelse

    </div>

    <script>

        $(function () {

            // var estacoes = [];

            // @foreach ($stations as $station)
            //     estacoes.push({{ $station->id }});
            // @endforeach

            // setInterval(() => setDanger(estacoes), 7000);

        });

        function setDanger(estacoes) {

            var id = estacoes[Math.floor(Math.random() * estacoes.length)];

            $('#station' + id).removeClass('box-default').addClass('box-danger');
            $('#station' + id + ' .widget-user-header').removeClass('bg-gray').addClass('bg-red');

            $('#alarme').text('Alarme na ' + $('#station' + id + ' h4').text());

            for (var i = 0; i < estacoes.length; i++) {
                
                if (estacoes[i] !== id) {
                    $('#station' + estacoes[i]).removeClass('box-danger').addClass('box-default');
                    $('#station' + estacoes[i] + ' .widget-user-header').removeClass('bg-red').addClass('bg-gray');
                }
                
            }

        }

        function formatarDataHora(data, out) {

            var out = out || false;

            var minutos = "";

            if (out)
                minutos = data.getMinutes() + 5;
            else
                minutos = data.getMinutes();

            var dia = data.getDate();
            var mes = data.getMonth() + 1;
            var ano = data.getFullYear();  

            if (dia.toString().length == 1)
                dia = "0" + dia;

            if (mes.toString().length == 1)
                mes = "0" + mes;
            
            return dia + "/" + mes + "/" + ano + " " + data.getHours() + ":" + minutos + ":" + data.getSeconds();
        }

        // $scope.init = function () {
        //     $http.get(window.urlOrder)
        //         .then(function (response) {
        //             console.log(response);
        //             if (response.status == 200) {
        //                 $scope.numberOrders = response.data.orders.length;
        //                 $scope.orders = response.data.orders;
        //             }
        //             $scope.run();
        //         }).catch(function (e) {
        //             $scope.run();
        //         });
        // };

        function iniGetData(estacaoId, serial, dataEntrada, dataSaida) {
            setTimeout(() => {
                getData(estacaoId, serial, dataEntrada, dataSaida);
            }, 3000);
        };

        function getData(estacaoId, serial, dataEntrada, dataSaida) {
            $.ajax({
                method: 'get',
                url: '{{ url('station/get-informations') }}/' + estacaoId,
                success: function(response, status, data) {
                    if (data.status == 200 && response.information) {
                        console.log('success: ', response.information);
                        $(serial).text(response.information.code);
                        $(dataEntrada).text(response.information.date);
                        $(dataSaida).text(response.information.date);
                    }
                    iniGetData(estacaoId, serial, dataEntrada, dataSaida);
                },
                error: function(data) {
                    console.log('error: ', data);
                    iniGetData(estacaoId, serial, dataEntrada, dataSaida);
                }
            });
        }

        function setData(estacaoId, serial, dataEntrada, dataSaida, numeroEstacoes) {

            $(serial).text(faker.random.alphaNumeric(8).toUpperCase());
                        
            var data = faker.date.past();

            $(dataEntrada).text(formatarDataHora(data));
            $(dataSaida).text(formatarDataHora(data, true));

            for (var i = 0; i < numeroEstacoes; i++) {
                $('.estacao' + estacaoId + i).val(faker.random.number(100));
            }

        }
    </script>
@stop