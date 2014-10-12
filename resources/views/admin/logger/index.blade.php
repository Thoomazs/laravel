@extends('admin.layouts.default')

@section('title')
User index | @parent
@stop


@section('content')


<div id="main-column">

    <div class="controls">
        <div class="row">
            <div class="col-sm-8">
                {{ Form::open(array('method' => 'GET')) }}
                <div class="input-group">
                    {{ Form::text('s', Input::get('s'), array('class' => 'form-control', 'autofocus' => 'true', 'placeholder' => Lang::get('form.placeholder.search') )) }}

                    <span class="input-group-btn">
                        {{ Form::submit(Lang::get('form.button.search'), array('class' => 'btn btn-success pull-right')) }}
                    </span>
                </div>
                {{ Form::close() }}
            </div>
            <div class="col-sm-4 hidden-xs">
                <div class="pull-right">
                    {{ $logs->appends(array('s' => Input::get('s')))->links()->with(array("type" => "small")) }}
                </div>
            </div>
        </div>
    </div>


    <div class="table-responsive">

        <table class="table table-condensed table-bordered table-responsive table-striped table-hover no-margin-bottom">
            <thead>
            <tr>
                <th class="id"><i class="fa fa-dot-circle-o"></i></th>
                <th class="id">{{ Lang::get('general.id') }}</th>
                <th>{{ Lang::get('general.date') }}</th>
                <th> {{{ Lang::get('user/user.name') }}} </th>
                <th>{{ Lang::get('general.message') }}</th>
                <th>{{ Lang::get('general.ip') }}</th>
            </tr>
            </thead>
            <tbody>

            @if( count( $logs) > 0)
            @foreach($logs as $log)
            <tr data-log="true" class="{{ $log->class }}">
                <td class="id text-center">
                    {{ $log->icon }}
                </td>
                <td class="id">
                    {{ $log->id }}
                </td>
                <td>
                    {{ $log->created_at }}
                </td>
                <td>
                    @if( $log->user )
                    <a href="{{ URL::route('admin.users.edit', $log->user->id) }}">
                        {{ $log->user->name }}
                    </a>
                    @else
                    <span class="muted">–</span>
                    @endif
                </td>
                <td class="message">
                    <small>{{{ $log->message }}}</small>
                </td>
                <td>
                    {{ $log->ip_address }}
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
    </div>


    @if( count( $logs) > 0)
    <div class="controls overflow-hidden">
        <div class="pull-right">
            {{ $logs->appends(array('s' => Input::get('s')))->links()->with(array("type" => "normal")) }}
        </div>
    </div>
    @endif


</div>

@stop

