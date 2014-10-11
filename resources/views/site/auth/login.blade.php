@extends('site.layouts.default')

@section('content')


    <div class="col-sm-6 col-sm-offset-3">

        <div class="well">

            {!! Form::open(['method' => 'POST', 'autocomplete' => 'off', 'novalidate', 'class' => 'form-basic']) !!}
                <fieldset>
                    <legend> {{{ Lang::get('user.login') }}}</legend>

                        <!-- Email Form Input -->

                        <div class="form-group @if($errors->has('email')) has-error @endif">
                            {!! Form::label('email', Lang::get('Email').':') !!}

                            @if ($errors->has('email')) <div class="form-error"> {{ $errors->first('email') }}</div> @endif

                            {!! Form::text('email', Input::old('email'), ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                        </div>

                        <!-- Password Form Input -->

                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            {!! Form::label('password', Lang::get('Password').':') !!}

                            @if ($errors->has('password')) <div class="form-error"> {{ $errors->first('password') }}</div> @endif

                            {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                        </div>

                        <!--  Remember Form Input -->

                        <div class="form-group @if($errors->has('')) has-error @endif">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox( 'remember_token' ) . Lang::get('user.remember') }}
                                </label>
                            </div>
                        </div>


                        <!-- Login Form Input -->

                        <div class="form-group">
                            {!! Form::button(Lang::get('user.login!'), ['type' => 'submit', 'class' => 'btn btn-primary form-control', 'autocomplete' => 'off']) !!}
                        </div>


                </fieldset>
            {!! Form::close() !!}

        </div>
    </div>
@stop
