@extends('adminlte::page')

@section('title')

@section('content')
    @if (session('message'))
        <div class="alert {{ session('class') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('station.create') }}" class="btn btn-danger btn-sm" style="margin-bottom: 10px;">NOVA ESTAÇÃO</a>
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Estações cadastradas</h4>
        </div>
        <div class="box-body no-padding">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Qtd. Leitores</th>
                            <th>Qtd. Zonas</th>
                            <th>Tipo</th>
                            <th>Criado em</th>
                            <th>Atualizado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stations as $station)
                            <tr>
                                <td>{{ sprintf('%03d', $station->id) }}</td>
                                <td>{{ $station->name }}</td>
                                <td>{{ $station->number_readers }}</td>
                                <td>{{ $station->number_zones }}</td>
                                <td>{{ $station->type_description }}</td>
                                <td>{{ $station->created }}</td>
                                <td>{{ $station->updated }}</td>
                                <td>
                                    
                                    {{-- <a href="{{ route('station.show', $station->id) }}" alt="Visualizar informações do estação" title="Visualizar informações do estação" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>                                     --}}
                                    
                                    <a href="{{ route('station.edit', $station->id) }}" alt="Editar estação" title="Editar estação" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>

                                    {{ Form::open(['method' => 'DELETE', 'route' => ['station.destroy', $station->id], 'style' => 'display: inline', 'onsubmit' => 'return confirmDelete()']) }}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'alt' => 'Deletar estação', 'title' => 'Deletar estação']) }}
                                    {{ Form::close() }}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer clearfix">
              {{ ($stations != null)? $stations->links(): null }}
        </div>
    </div>
@stop