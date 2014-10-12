@extends('site.layouts.master')

@section('content')

    <h1 class="text-center">Index</h1>


<form action="{{ route("home") }}" method="POST">

{{ var_dump($errors->all()) }}
@if ($errors->any())
    <ul>
        @foreach($errors->all()as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ul>
@endif

<input type="text" name="asd" id=""/>




</form>
@stop
