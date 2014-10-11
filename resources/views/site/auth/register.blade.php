@extends('site.layouts.default')

@section('content')

   <div class="col-sm-6 col-sm-offset-3">

       <div class="well">

            {!! Form::open(array( 'method' => 'POST', 'autocomplete' => 'off', 'novalidate')) !!}
                <fieldset>
                    <legend> {{{ Lang::get('user.register') }}}</legend>

                        <!-- Firstname Form Input -->

                        <div class="form-group @if($errors->has('firstname')) has-error @endif">
                            {{ Form::label('firstname', Lang::get('user.firstname').':') }}

                            @if ($errors->has('firstname')) <div class="form-error"> {{ $errors->first('firstname') }}</div> @endif

                            {{ Form::text('firstname', Input::old('firstname'), ['class' => 'form-control', 'autocomplete' => 'off']) }}
                        </div>

                        <!-- Lastname Form Input -->

                        <div class="form-group @if($errors->has('lastname')) has-error @endif">
                            {{ Form::label('lastname', Lang::get('user.lastname').':') }}

                            @if ($errors->has('lastname')) <div class="form-error"> {{ $errors->first('lastname') }}</div> @endif

                            {{ Form::text('lastname', Input::old('lastname'), ['class' => 'form-control', 'autocomplete' => 'off']) }}
                        </div>


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

                       <!-- Password_confirmation Form Input -->

                       <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                           {!! Form::label('password_confirmation', Lang::get('Password_confirmation').':') !!}

                           @if ($errors->has('password_confirmation')) <div class="form-error"> {{ $errors->first('password_confirmation') }}</div> @endif

                           {!! Form::password('password_confirmation', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                       </div>

                       <!-- Register Form Input -->

                       <div class="form-group">
                           {!! Form::button(Lang::get('user.register!'), ['type' => 'submit', 'class' => 'btn btn-primary form-control', 'autocomplete' => 'off']) !!}
                       </div>

                </fieldset>
            {!! Form::close() !!}
        </div>
    </div>

@stop
