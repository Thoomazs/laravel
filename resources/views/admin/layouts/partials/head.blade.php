<!-- Basic Page Needs
   ================================================== -->
<meta charset="utf-8"/>
<title>
    @section('title')
        Admin Starter App
    @show
</title>

<meta name="keywords" content="your, awesome, keywords, here"/>
<meta name="author" content="Tomáš Novotný, Cynet.cz"/>
<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />


<!-- CSS
================================================== -->
{!! HTML::style('css/bootstrap.min.css') !!}
{!! HTML::style('css/font-awesome.min.css') !!}
{!! HTML::style('css/style-admin.css') !!}

<!-- Favicons
================================================== -->
<link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">

<!-- JS
================================================== -->
{!! HTML::script('js/jQuery/jquery.min.js') !!}
{!! HTML::script('js//bootstrap.min.js') !!}
{!! HTML::script('js/Class/Ext_functions.js') !!}
{!! HTML::script('js/Admin.js') !!}