@extends('admin.layouts.default')

@section('content')

<div class="row margin-top">
    <div class="col-sm-6 col-sm-offset-3">
        {!! Form::open(array('url' => URL::route('admin.users.store'), 'method' => 'POST')) !!}

        <fieldset>
            <legend>
                {{{ Lang::get('user.new_user') }}}
            </legend>

            <div class="form-group @if ($errors->has('firstname')) has-error @endif">

                {!! Form::label('firstname', Lang::get('user.firstname'), array()) !!}

                @if ($errors->has('firstname'))
                <div class="form-error"> {{ $errors->first('firstname') }}</div>
                @endif

                {!! Form::text('firstname', Input::old('firstname'), array('class' => 'form-control', 'autocomplete' => 'off' )) !!}

            </div>
            <div class="form-group @if ($errors->has('lastname')) has-error @endif">

                {!! Form::label('lastname', Lang::get('user.lastname'), array()) !!}

                @if ($errors->has('lastname'))
                <div class="form-error"> {{ $errors->first('lastname') }}</div>
                @endif

                {!! Form::text('lastname', Input::old('lastname'), array('class' => 'form-control', 'autocomplete' => 'off' )) !!}

            </div>

            <div class="form-group @if ($errors->has('email')) has-error @endif">

                {!! Form::label('email', Lang::get('user.email'), array()) !!}

                @if ($errors->has('email'))
                <div class="form-error"> {{ $errors->first('email') }}</div>
                @endif

                {!! Form::text('email', Input::old('email'), array('class' => 'form-control', 'required')) !!}

            </div>

            <div class="form-group @if ($errors->has('password')) has-error @endif">

                {!! Form::label('password', Lang::get('user.password'), array()) !!}

                @if ($errors->has('password'))
                <div class="form-error"> {{ $errors->first('password') }}</div>
                @endif

                {!! Form::password('password', array('class' => 'form-control', 'autocomplete' => 'off', 'required' )) !!}

            </div>

            <div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">

                {!! Form::label('confirm_password', Lang::get('user.confirm_password'), array()) !!}

                @if ($errors->has('password_confirmation'))
                <div class="form-error"> {{ $errors->first('password_confirmation') }}</div>
                @endif

                {!! Form::password('password_confirmation', array('class' => 'form-control', 'autocomplete' => 'off', 'required' )) !!}

            </div>

            {!! Form::button( Lang::get('form.button.register'), array('type' => 'submit', 'class' => 'btn btn-success btn-block')); !!}

        </fieldset>

        {!! Form::close() !!}
    </div>
</div>
@stop
