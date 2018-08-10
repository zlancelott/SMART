@extends('adminlte::page')

@section('title')

@section('content')
    <div class="row">
        @forelse ($stations as $station)

            @if ($station->type == config('stations.oven'))
                <div class="col-md-8">
                    <div class="box box-default no-padding">
                        <!-- /.box-header -->
                        <div class="box-body station">
                            <div class="col-md-12">
                                <div class="box box-widget widget-user-2">
                                    <div class="widget-user-header bg-gray">
                                        <h4>{{ $station->name }}</h4>
                                    </div>
                                    <div class="col-md-4 no-padding">
                                        <div class="box-footer no-padding">
                                            <ul class="nav nav-stacked">
                                                <li><a href="#">Serial <span class="pull-right badge bg-gray">???</span></a></li>
                                                <li><a href="#">Data <span class="pull-right badge bg-gray">???</span></a></li>
                                                <li><a href="#">Leitores <span class="pull-right badge bg-gray">{{ $station->number_readers }}</span></a></li>
                                                <li><a href="#">Zonas <span class="pull-right badge bg-gray">{{ $station->number_zones }}</span></a></li>
                                                <li><a href="#">Tipo <span class="pull-right badge bg-gray">{{ $station->type_description }}</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="box-footer no-padding">
                                            <div class="box box-solid">
                                                <div class="box-body">
                                                    <h4 class="zonas">
                                                        SP / PV - SUPERIOR
                                                    </h4>
                                                    <div class="row">
                                                        @for ($i = 0; $i < $station->number_zones; $i++)
                                                            <div class="col-xs-1">
                                                                <input class="form-control input-sm" type="text" readonly>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                    <div class="row" style="margin-top: 4px">
                                                        @for ($i = 0; $i < $station->number_zones; $i++)
                                                            <div class="col-xs-1">
                                                                <input class="form-control input-sm" type="text" readonly>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer no-padding">
                                            <div class="box box-solid">
                                                <div class="box-body">
                                                    <h4 class="zonas">
                                                        SP / PV - INFERIOR
                                                    </h4>
                                                    <div class="row">
                                                        @for ($i = 0; $i < $station->number_zones; $i++)
                                                            <div class="col-xs-1">
                                                                <input class="form-control input-sm" type="text" readonly>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                    <div class="row" style="margin-top: 4px">
                                                        @for ($i = 0; $i < $station->number_zones; $i++)
                                                            <div class="col-xs-1">
                                                                <input class="form-control input-sm" type="text" readonly>
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
            @else
                <div class="col-md-4">
                    <div class="box box-default no-padding">
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
                                                <li><a href="#">Serial <span class="pull-right badge bg-gray">???</span></a></li>
                                                <li><a href="#">Data <span class="pull-right badge bg-gray">???</span></a></li>
                                                <li><a href="#">Leitores <span class="pull-right badge bg-gray">{{ $station->number_readers }}</span></a></li>
                                                <li><a href="#">Zonas <span class="pull-right badge bg-gray">{{ $station->number_zones }}</span></a></li>
                                                <li><a href="#">Tipo <span class="pull-right badge bg-gray">{{ $station->type_description }}</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            @endif

        @empty
            <h1>Nenhuma estação cadastrada</h1>
        @endforelse

    </div>
@stop