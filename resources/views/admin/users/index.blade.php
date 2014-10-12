@extends('admin.layouts.master')

@section('title')
User index | @parent
@stop


@section('content')


        <div class="controls">
            <div class="row">
                <div class="col-sm-8">
                    {!! Form::open(array('method' => 'GET')) !!}
                    <div class="input-group">
                        {!! Form::text('s', Input::get('s'), array('class' => 'form-control', 'autofocus' => 'true', 'placeholder' => Lang::get('form.placeholder.search') )) !!}

                    <span class="input-group-btn">
                        {!! Form::submit(Lang::get('form.button.search'), array('class' => 'btn btn-success pull-right')) !!}
                    </span>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-4 hidden-xs">
                    <div class="pull-right">

                        <a href="{{ URL::route('admin.users.create') }}" class="create btn btn-default">
                            <i class="fa fa-plus-circle text-success"></i><span class="hidden-xs"> {{ Lang::get('form.label.new_user') }}</span>
                        </a>
                        {{--{{ $users->appends(array('s' => Input::get('s')))->links()->with(array("type" => "small")) }}--}}

                    </div>
                </div>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-responsive table-striped table-hover no-margin-bottom">
                <thead>
                <tr>
                    <th class="id">{{ Lang::get('general.id') }}</th>
                    <th>{{ Lang::get('form.label.email') }}</th>
                    <th>{{ Lang::get('form.label.name') }}</th>
                    <th>{{ Lang::get('form.label.actions') }}</th>
                </tr>
                </thead>
                <tbody>

                @if( count( $users) > 0)
                @foreach($users as $user)
                <tr data-preview="{{ URL::route('admin.users.show', [], $user->id ) }}">
                    <td class="id">
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->firstname }} {{ $user->lastname }}
                    </td>
                    <td class="actions">
                        <a class="update btn btn-xs btn-default" href="{{ URL::route('admin.users.edit', [$user->id] ) }}" title="{{ Lang::get('form.button.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>

                        <div class="inline-block" title="{{ Lang::get('form.button.delete') }}">

                            {!! Form::open(array('url' => URL::route('admin.users.destroy', [$user->id] ), 'method' => 'DELETE')) !!}

                            {!! Form::button( '<i class="fa fa-times"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger', 'data-warning' => 'true')); !!}

                            {!! Form::close() !!}

                        </div>
                    </td>
                </tr>
                @endforeach

                @else
                <tr>
                    <td colspan="99" class="end">
                        {{{ Lang::get('messages.no_found') }}}
                    </td>
                </tr>
                @endif

                </tbody>
            </table>

            @if( count( $users) > 0)
            <div class="controls overflow-hidden">
                <div class="pull-right">
{{--                    {{ $users->appends(array('s' => Input::get('s')))->links()->with(array("type" => "normal")) }}--}}
                </div>
            </div>
            @endif

    </div>
</div>

@stop