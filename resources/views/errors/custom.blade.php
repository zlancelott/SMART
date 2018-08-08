
@extends('adminlte::page')

@section('title')

@section('content')
    <h1 class="kern-this">Exception details: {{ $exception->getMessage() }}</h1>
@stop
