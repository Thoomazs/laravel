@extends('site.layouts.master')

@section('content')

   <div class="col-sm-6 col-sm-offset-3">

       <div class="well">

            {!! Form::open([ 'route' => 'auth.register', 'method' => 'POST', 'autocomplete' => 'off', 'class' => 'form-basic' ]) !!}
                <fieldset>
                    <legend>Register</legend>

                        {{ var_dump($errors) }}

                        @if ($errors->any())
                            <ul>
                                @foreach($errors->all()as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        @endif


                        <!-- Firstname Form Input -->

                        <div class="form-group @if($errors->has('firstname')) has-error @endif">
                            {!! Form::label('firstname', 'Firstname:') !!}

                            {!! $errors->first('firstname', '<div class="form-error">:message</div>') !!}

                            {!! Form::text('firstname', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                        </div>

                        <!-- Lastname Form Input -->

                        <div class="form-group @if($errors->has('lastname')) has-error @endif">
                            {!! Form::label('lastname', 'Lastname:') !!}

                            {!! $errors->first('lastname', '<div class="form-error">:message</div>') !!}

                            {!! Form::text('lastname', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                        </div>

                        <!-- Email Form Input -->

                        <div class="form-group @if($errors->has('email')) has-error @endif">
                            {!! Form::label('email', 'Email:') !!}

                            {!! $errors->first('email', '<div class="form-error">:message</div>') !!}

                            {!! Form::text('email', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                        </div>

                        <!-- Password Form Input -->

                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            {!! Form::label('password', 'Password:') !!}

                            {!! $errors->first('password', '<div class="form-error">:message</div>') !!}

                            {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                        </div>

                        <!-- Password_confirmation Form Input -->

                        <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                            {!! Form::label('password_confirmation', 'Password_confirmation:') !!}

                            {!! $errors->first('password_confirmation', '<div class="form-error">:message</div>') !!}

                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                        </div>

                        <!-- Register Form Input -->

                        <div class="form-group">
                            {!! Form::button('Register', ['type' => 'submit', 'class' => 'btn btn-primary form-control']) !!}
                        </div>


                </fieldset>
            {!! Form::close() !!}
        </div>
    </div>

@stop
