<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('', 'Tipo do perfil: ') }}
                @foreach ($user->profiles as $profile)
                    <span class="badge">{{ $profile->name }}</span>
                @endforeach
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Nome') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Senha') }}<br>
                {{ Form::password('password', array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Confirmação de senha') }}<br>
                {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    {{ Form::submit($submitButtonText, ['class' => 'btn btn-smart btn-sm']) }}
</div>