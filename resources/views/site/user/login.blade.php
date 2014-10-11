@extends('site.layouts.default')

@section('title')
{{{ Lang::get('user/user.login') }}} |
@parent
@stop

{{-- Content --}}
@section('content')


<div class="col-sm-6 col-sm-offset-3">

    {{ Form::open(array('url' => URL::route('login'), 'method' => 'POST')) }}

    <fieldset>
        <legend> {{{ Lang::get('button.login') }}}</legend>

        <div class="form-group @if ($errors->has('email')) has-error @endif">

            {{ Form::label('email', Lang::get('user/user.email'), array()) }}

            @if ($errors->has('email'))
            <div class="form-error"> {{ $errors->first('email') }}</div>
            @endif

            {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}

        </div>

        <div class="form-group @if ($errors->has('password')) has-error @endif">

            {{ Form::label('password', Lang::get('user/user.password'), array()) }}

            @if ($errors->has('password'))
            <div class="form-error"> {{ $errors->first('password') }}</div>
            @endif

            {{ Form::password('password', array('class' => 'form-control')) }}

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


        {{ Form::button( Lang::get('button.login'), array('type' => 'submit', 'class' => 'btn btn-success btn-block')) }}

    </fieldset>

    {{ Form::close() }}
</div>

@stop
