@extends('site.layouts.default')

@section('title')
{{{ Lang::get('user/user.register') }}} |
@parent
@stop

{{-- Content --}}
@section('content')


<div class="col-sm-6 col-sm-offset-3">

    {{ Form::open(array('url' => URL::route('register'), 'method' => 'POST', 'autocomplete' => 'off', 'novalidate')) }}

    <fieldset>
        <legend> {{{ Lang::get('button.register') }}}</legend>

        <div class="form-group @if ($errors->has('username')) has-error @endif">

            {{ Form::label('username', Lang::get('user/user.username'), array()) }}

            @if ($errors->has('username'))
            <div class="form-error"> {{ $errors->first('username') }}</div>
            @endif

            {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'autocomplete' => 'off' )) }}

        </div>

        <div class="form-group @if ($errors->has('firstname')) has-error @endif">
            
            {{ Form::label('firstname', Lang::get('user/user.firstname'), array()) }}

            @if ($errors->has('firstname'))
            <div class="form-error"> {{ $errors->first('firstname') }}</div>
            @endif

            {{ Form::text('firstname', Input::old('firstname'), array('class' => 'form-control', 'autocomplete' => 'off' )) }}
            
        </div>
        <div class="form-group @if ($errors->has('lastname')) has-error @endif">

            {{ Form::label('lastname', Lang::get('user/user.lastname'), array()) }}

            @if ($errors->has('lastname'))
            <div class="form-error"> {{ $errors->first('lastname') }}</div>
            @endif

            {{ Form::text('lastname', Input::old('lastname'), array('class' => 'form-control', 'autocomplete' => 'off' )) }}
            
        </div>

        <div class="form-group @if ($errors->has('email')) has-error @endif">

            {{ Form::label('email', Lang::get('user/user.email'), array()) }}

            @if ($errors->has('email'))
            <div class="form-error"> {{ $errors->first('email') }}</div>
            @endif

            {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'required')) }}

        </div>

        <div class="form-group @if ($errors->has('password')) has-error @endif">

            {{ Form::label('password', Lang::get('user/user.password'), array()) }}

            @if ($errors->has('password'))
            <div class="form-error"> {{ $errors->first('password') }}</div>
            @endif

            {{ Form::password('password', array('class' => 'form-control', 'autocomplete' => 'off', 'required' )) }}

        </div>

        <div class="form-group @if ($errors->has('confirm_password')) has-error @endif">

            {{ Form::label('confirm_password', Lang::get('user/user.confirm_password'), array()) }}

            @if ($errors->has('confirm_password'))
            <div class="form-error"> {{ $errors->first('confirm_password') }}</div>
            @endif

            {{ Form::password('confirm_password', array('class' => 'form-control', 'autocomplete' => 'off', 'required' )) }}

        </div>

        {{ Form::button( Lang::get('button.register'), array('type' => 'submit', 'class' => 'btn btn-success btn-block')); }}

    </fieldset>
    {{ Form::close() }}

</div>

@stop
