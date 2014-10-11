<!-- Basic Page Needs
   ================================================== -->
<meta charset="utf-8"/>
<title>
    @section('title')
        Starter App
    @show
</title>
<meta name="keywords" content="your, awesome, keywords, here"/>
<meta name="author" content="Tomáš Novotný, Cynet.cz"/>
<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ elixir("all.min.css") }}"/>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
{!! HTML::script('http://html5shim.googlecode.com/svn/trunk/html5.js') !!}
<![endif]-->

<!-- Favicons
================================================== -->
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">


<!-- JS
================================================== -->
{!! HTML::script('assets/js/jQuery/jquery.min.js') !!}
{!! HTML::script('assets/js/bootstrap.min.js') !!}
{!! HTML::script('assets/js/Class/Ext_functions.js') !!}