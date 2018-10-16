@extends('adminlte::page')

@section('title')

@section('content')
    {{-- <h1 class="kern-this">{{ $exception->getMessage() }}</h1> --}}
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-ban"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Atenção!</span>
                <span class="info-box-number">{{ $exception->getMessage() }}</span>
                <div class="progress">
                    <div class="progress-bar" style="width: 0%"></div>
                </div>
                <span class="progress-description">
                    Se você acha que isso é um engano, por favor, contacte o Administrador do sistema.
                </span>
            </div>
        </div>
    </div>
@stop