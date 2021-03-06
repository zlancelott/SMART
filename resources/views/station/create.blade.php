@extends('adminlte::page')

@section('title')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-8">
        @if (session('message'))
            <div class="alert {{ session('class') }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ Form::open(array('route' => 'station.store', 'role' => 'form')) }}
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="margin-top: 10px;">Informações da estação</h3>
                </div>
                <!-- /.box-header -->
                @include('station.partials.form', ['submitButtonText' => 'Salvar dados'])
            </div>
            <!-- /.box -->
        {{ Form::close() }}
    </div>
    <!-- /.col-md-8 -->
</div>
<!-- /.row -->
@stop