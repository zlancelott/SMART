@extends('adminlte::page')

@section('title')

@section('content')
    @if (session('message'))
        <div class="alert alert-{{ session('code') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('page.create') }}" class="btn btn-danger btn-sm" style="margin-bottom: 10px;">NOVA PÁGINA</a>
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Páginas cadastradas</h4>
        </div>
        <div class="box-body no-padding">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Rota</th>
                            <th>Quem pode acessar</th>
                            <th>Tipo de ações permitidas</th>
                            <th>Criado em</th>
                            <th>Atualizado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $page)
                            <tr>
                                <td>{{ $page->name }}</td>
                                <td>{{ $page->route }}</td>
                                <td>
                                    @foreach ($page->profiles as $profile)
                                        <span class="badge">{{ $profile->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @isset($page->profiles[0]->pivot)
                                        @if ($page->profiles[0]->pivot->view)
                                            <span class="badge">Visualizar</span>    
                                        @endif

                                        @if ($page->profiles[0]->pivot->create)
                                            <span class="badge">Registrar</span>    
                                        @endif

                                        @if ($page->profiles[0]->pivot->edit)
                                            <span class="badge">Editar</span>    
                                        @endif

                                        @if ($page->profiles[0]->pivot->delete)
                                            <span class="badge">Deletar</span>    
                                        @endif
                                    @endisset
                                </td>
                                <td>{{ $page->created }}</td>
                                <td>{{ $page->updated }}</td>
                                <td>
                                    <a href="{{ route('page.edit', $page->id) }}" alt="Editar página" title="Editar página" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>

                                    {{ Form::open(['method' => 'DELETE', 'route' => ['page.destroy', $page->id], 'style' => 'display: inline', 'onsubmit' => 'return confirmDelete()']) }}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'alt' => 'Deletar página', 'title' => 'Deletar página']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer clearfix">
              {{ ($pages != null)? $pages->links(): null }}
        </div>
    </div>
@stop