@extends('adminlte::page')

@section('title')

@section('content')
    @if (session('message'))
        <div class="alert {{ session('class') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('message') }}
        </div>
    @endif
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Perfis cadastrados</h4>
        </div>
        <div class="box-body no-padding">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Sigla</th>
                            <th>Descrição</th>
                            <th>Criado em</th>
                            <th>Atualizado em</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($profiles as $profile)
                            <tr>
                                <td>{{ $profile->name }}</td>
                                <td>{{ $profile->initials }}</td>
                                <td>{{ $profile->description }}</td>
                                <td>{{ $profile->created }}</td>
                                <td>{{ $profile->updated }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer clearfix">
              {{ ($profiles != null)? $profiles->links(): "null" }}
        </div>
    </div>
@stop