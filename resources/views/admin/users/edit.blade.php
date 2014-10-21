@extends('admin.layouts.master')

@section('content')

<div class="row margin-top">
    <div class="col-sm-6 col-sm-offset-3">

        {!! Form::model($user,['route' => ['admin.users.update',$user->id], 'method' => 'PATCH']) !!}

        <fieldset>

            {!! Form::hidden('id', $user->id) !!}

            <legend>
                #{{ $user->id }} {{ $user->name }}
            </legend>

            @include("admin.users._form")

            {!! Form::button( 'Edit', array('type' => 'submit', 'class' => 'btn btn-success btn-block')); !!}

        </fieldset>

        {!! Form::close() !!}
    </div>
</div>
@stop
