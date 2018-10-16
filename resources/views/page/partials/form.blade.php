<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('', 'Quem pode acessar?') }}
                @foreach ($profiles as $profile)
                    <div class="icheck-wetasphalt">
                        {{ Form::checkbox('profiles[]', $profile->id, isset($page) ? $page->profiles : null, ['id' => $profile->initials]) }}
                        <label for="{{ $profile->initials }}">{{ $profile->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                {{ Form::label('', 'O que será permitido?') }}
                <div class="icheck-wetasphalt">
                    {{ Form::checkbox('consult', 1, isset($page->profiles[0]->pivot) ? $page->profiles[0]->pivot->consult : null, ['id' => 'consult']) }}
                    <label for="consult">Consultar</label>
                </div>
                <div class="icheck-wetasphalt">
                    {{ Form::checkbox('register', 1, isset($page->profiles[0]->pivot) ? $page->profiles[0]->pivot->register : null, ['id' => 'register']) }}
                    <label for="register">Registrar</label>
                </div>
                <div class="icheck-wetasphalt">
                    {{ Form::checkbox('edit', 1, isset($page->profiles[0]->pivot) ? $page->profiles[0]->pivot->edit : null, ['id' => 'edit']) }}
                    <label for="edit">Editar</label>
                </div>
                <div class="icheck-wetasphalt">
                    {{ Form::checkbox('delete', 1, isset($page->profiles[0]->pivot) ? $page->profiles[0]->pivot->delete : null, ['id' => 'delete']) }}
                    <label for="delete">Deletar</label>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Nome') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('url', 'Rota') }}
                {{ Form::text('url', null, array('class' => 'form-control')) }}
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    {{ Form::submit($submitButtonText, ['class' => 'btn btn-smart btn-sm']) }}
</div>