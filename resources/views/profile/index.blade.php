@extends('adminlte::page')

@section('title')

@section('content')
    @if (session('message'))
        <div class="alert {{ session('class') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('profile.create') }}" class="btn btn-danger btn-sm" style="margin-bottom: 10px;">NOVA PERFIL</a>
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
                            <th>Ações</th>
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
                                <td>
                                    
                                    <a href="{{ route('profile.edit', $profile->id) }}" alt="Editar perfil" title="Editar perfil" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>

                                    {{ Form::open(['method' => 'DELETE', 'route' => ['profile.destroy', $profile->id], 'style' => 'display: inline', 'onsubmit' => 'return confirmDelete()']) }}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'alt' => 'Deletar perfil', 'title' => 'Deletar perfil']) }}
                                    {{ Form::close() }}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer clearfix">
              {{ ($profiles != null)? $profiles->links(): null }}
        </div>
    </div>
@stop