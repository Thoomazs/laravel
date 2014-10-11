@extends('site.layouts.default')

@section('content')

<h1 class="text-center">{{{ Auth::user()->firstname . " " . Auth::user()->lastname}}} <span class="muted">– {{{ Auth::user()->username }}}</span></h1>

@stop
