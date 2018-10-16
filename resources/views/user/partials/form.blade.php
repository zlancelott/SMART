<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                @foreach ($profiles as $profile)
                    <div class="icheck-wetasphalt">
                        {{ Form::checkbox('profiles[]', $profile->id, isset($user) ? $user->profiles : null, ['id' => $profile->initials]) }}
                        <label for="{{ $profile->initials }}">{{ $profile->name }}</label>
                    </div>
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