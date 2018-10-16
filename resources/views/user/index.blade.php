@extends('adminlte::page')

@section('title')

@section('content')
    @if (session('message'))
        <div class="alert alert-{{ session('code') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('user.create') }}" class="btn btn-danger btn-sm" style="margin-bottom: 10px;">NOVO USUÁRIO</a>
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Usuário cadastrados</h4>
        </div>
        <div class="box-body no-padding">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Perfil</th>
                            <th>Criado em</th>
                            <th>Atualizado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ sprintf('%03d', $user->id) }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @foreach ($user->profiles as $profile)
                                        <span class="badge">{{ $profile->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $user->created }}</td>
                                <td>{{ $user->updated }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" alt="Editar usuário" title="Editar usuário" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                    
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id], 'style' => 'display: inline', 'onsubmit' => 'return confirmDelete()']) }}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'alt' => 'Deletar usuário', 'title' => 'Deletar usuário']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer clearfix">
              {{ ($users != null)? $users->links(): null }}
        </div>
    </div>
@stop