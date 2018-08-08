@extends('adminlte::page')

@section('title')

@section('content')
    <h1 class="kern-this">Erro: {{ $exception->getMessage() }}</h1>
@stop