@extends('site.layouts.default')

@section('content')

    <h1>{{ Auth::user()->name }}</h1>

@stop
