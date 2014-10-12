@extends('site.layouts.master')

@section('title')
{{{ Lang::get('user/user.login') }}} |
@parent
@stop

{{-- Content --}}
@section('content')


<div class="col-sm-6 col-sm-offset-3">

    {!! Form::open(array('route' => 'auth.login', 'method' => 'POST', 'autocomplete' => 'off', 'novalidate', 'class' => 'form-basic')) }}
        <fieldset>
            <legend>Login</legend>

        <!-- Email Form Input -->

        <div class="form-group @if($errors->has('email')) has-error @endif">
            {!! Form::label('email', 'Email:') !!}

            {!! $errors->first('email', '<div class="form-error">:message</div>') !!}

            {!! Form::email('email', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
        </div>


        <!-- Password Form Input -->

        <div class="form-group @if($errors->has('password')) has-error @endif">
            {!! Form::label('password', 'Password:') !!}

            {!! $errors->first('password', '<div class="form-error">:message</div>') !!}

            {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
        </div>



        <div class="row">
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox( 'remember' ) . Lang::get('user/user.remember') }}
                    </label>
                </div>
            </div>
            <div class="col-sm-6 text-right">
                <!--                    <button class="btn btn-link text-muted" type="button" onclick="document.login.submit();" name="forget-password" style="margin: 3px 0;">-->
                <!--                        zapomenuté heslo-->
                <!--                    </button>-->
            </div>
        </div>


        <!-- Login Form Input -->

        <div class="form-group">
            {!! Form::button('Login', ['type' => 'submit', 'class' => 'btn btn-primary form-control']) !!}
        </div>

    </fieldset>



        </fieldset>
    {!! Form::close() !!}

</div>

@stop
