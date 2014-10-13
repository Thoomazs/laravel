@extends('site.layouts.master')

@section('content')

    {{-- TODO: quick fix --}}
    <?php $errors = Session::has('errors') ? Session::get('errors') : $errors; ?>
    <div class="col-sm-6 col-sm-offset-3">

        <div class="well">

            {!! Form::open(['route' => 'auth.login', 'method' => 'POST', 'autocomplete' => 'off', 'novalidate', 'class' => 'form-basic']) !!}
                    <fieldset>
                        <legend>Login</legend>

                    <!-- Email Form Input -->

                    <div class="form-group {{ $errors->has('email') ? 'has-error': '' }}">
                        {!! Form::label('email', 'Email:') !!}

                        {!! $errors->first('email', '<div class="form-error">:message</div>') !!}

                        {!! Form::email('email', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                    </div>


                    <!-- Password Form Input -->

                    <div class="form-group {{ $errors->has('password') ? 'has-error': '' }}">
                        {!! Form::label('password', 'Password:') !!}

                        {!! $errors->first('password', '<div class="form-error">:message</div>') !!}

                        {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                    </div>



                    <div class="row">
                        <div class="col-sm-6">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox( 'remember' ) !!}  Remember
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
    </div>
@stop
