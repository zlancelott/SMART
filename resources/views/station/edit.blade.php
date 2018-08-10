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
        {{ Form::model($station, ['route' => ['station.update', $station->id], 'method' => 'PUT']) }}
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="margin-top: 10px;">Informações do estação</h3>
                </div>
                <!-- /.box-header -->
                @include('station.partials.form', ['submitButtonText' => 'Editar dados'])
            </div>
            <!-- /.box -->
        {{ Form::close() }}
    </div>
    <!-- /.col-md-8 -->
</div>
<!-- /.row -->
@stop