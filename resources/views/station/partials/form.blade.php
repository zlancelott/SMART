<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('name', 'Nome') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Tipo') }}
                {{ Form::select('type', 
                    [
                        '' => 'Selecione...', 
                        config('stations.simple') => 'Simples',
                        config('stations.oven') => 'Forno',
                    ], null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('number_readers', 'Número de leitores') }}
                {{ Form::select('number_readers', 
                    [
                        '' => 'Selecione...', 
                        0 => 0,
                        1 => 1,
                        2 => 2,
                    ], null, ['class' => 'form-control']) }}
            </div>

            {{-- leitores --}}
            <div class="row" id="leitor1" style="display: none">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('ip1', 'IP do leitor 1') }}
                        {{ Form::text('ip1', !isset($station->readers[0]) ?: $station->readers[0]->ip, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('reader_type1', 'Tipo do leitor 1') }}
                        {{ Form::text('reader_type1', !isset($station->readers[0]) ?: $station->readers[0]->type, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('position1', 'Posição do leitor 1') }}
                        {{ Form::select('position1', 
                            [
                                '' => 'Selecione...', 
                                config('positions.start') => 'Início',
                                config('positions.end') => 'Fim',
                            ], !isset($station->readers[0]) ?: $station->readers[0]->position, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row" id="leitor2" style="display: none">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('ip2', 'IP do leitor 2') }}
                        {{ Form::text('ip2', !isset($station->readers[1]) ?: $station->readers[1]->ip, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('reader_type2', 'Tipo do leitor 2') }}
                        {{ Form::text('reader_type2', !isset($station->readers[1]) ?: $station->readers[1]->type, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('position2', 'Posição do leitor 2') }}
                        {{ Form::select('position2', 
                            [
                                '' => 'Selecione...', 
                                config('positions.start') => 'Início',
                                config('positions.end') => 'Fim',
                            ], !isset($station->readers[1]) ?: $station->readers[1]->position, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('number_zones', 'Número de zonas') }}
                {{ Form::text('number_zones', null, array('class' => 'form-control')) }}
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    {{ Form::submit($submitButtonText, ['class' => 'btn btn-smart btn-sm']) }}
</div>

<script>
    $(function () {

        exibirLeitores($('#number_readers').val());

        $('#number_readers').change(function () {
            exibirLeitores($(this).val());
        });

    });

    var exibirLeitores = function (leitor) {
        if ( leitor == 0 ) {
            $('#leitor1').hide();
            $('#leitor2').hide();

            limparLeitor(1);
            limparLeitor(2);

        } else if ( leitor == 1 ) {
            $('#leitor1').show();
            $('#leitor2').hide();
            
            limparLeitor(2);
        } else {
            $('#leitor1').show();
            $('#leitor2').show();
            
            limparLeitor(2);
        }
    };

    var limparLeitor = function (leitor) {
        $('#ip' + leitor).val('');
        $('#reader_type' + leitor).val('');
        $('#position' + leitor).val('');
    }
</script>