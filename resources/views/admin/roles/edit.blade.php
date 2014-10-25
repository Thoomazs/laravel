@extends('admin.layouts.master')

@section('content')

<div class="row margin-top">
    <div class="col-sm-6 col-sm-offset-3">

        {!! Form::model($role, ['route' => ['admin.roles.update',$role->id], 'method' => 'PATCH']) !!}

        <fieldset>

            {!! Form::hidden('id', $role->id) !!}

            <legend>
                #{{ $role->id }} {{ $role->name }}
            </legend>

            @include("admin.roles._form")

            {!! Form::button( trans('Edit'), array('type' => 'submit', 'class' => 'btn btn-success btn-block')); !!}

        </fieldset>

        {!! Form::close() !!}
    </div>
</div>
@stop
