@extends('admin.layouts.simple')

@section('content')

<div style="padding: 10px;">
    {{ Form::open(array('url' => URL::route('admin.users.update', $user->id), 'method' => 'PATCH')) }}

    <fieldset>

        {{ Form::hidden('id', $user->id) }}

        <legend>
            #{{ $user->id }} {{ $user->username }}
        </legend>

        <div class="form-group @if ($errors->has('username')) has-error @endif">

            {{ Form::label('username', Lang::get('user/user.username'), array()) }}

            @if ($errors->has('username'))
            <div class="form-error"> {{ $errors->first('username') }}</div>
            @endif

            {{ Form::text('username', $user->username, array('class' => 'form-control', 'readonly' => 'true' )) }}

        </div>

        <div class="form-group @if ($errors->has('firstname')) has-error @endif">

            {{ Form::label('firstname', Lang::get('user/user.firstname'), array()) }}

            @if ($errors->has('firstname'))
            <div class="form-error"> {{ $errors->first('firstname') }}</div>
            @endif

            {{ Form::text('firstname', $user->firstname, array('class' => 'form-control', 'readonly' => 'true' )) }}

        </div>
        <div class="form-group @if ($errors->has('lastname')) has-error @endif">

            {{ Form::label('lastname', Lang::get('user/user.lastname'), array()) }}

            @if ($errors->has('lastname'))
            <div class="form-error"> {{ $errors->first('lastname') }}</div>
            @endif

            {{ Form::text('lastname', $user->lastname, array('class' => 'form-control', 'readonly' => 'true' )) }}

        </div>

        <div class="form-group @if ($errors->has('email')) has-error @endif">

            {{ Form::label('email', Lang::get('user/user.email'), array()) }}

            @if ($errors->has('email'))
            <div class="form-error"> {{ $errors->first('email') }}</div>
            @endif

            {{ Form::text('email', $user->email, array('class' => 'form-control', 'readonly' => 'true')) }}

        </div>

    </fieldset>

    {{ Form::close() }}
</div>
@stop
