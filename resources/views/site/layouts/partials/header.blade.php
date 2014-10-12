<div id="header-title">
    <div class="container">

        <a href="{{{ URL::route('home') }}}">
            <h1 class="pull-left">

                <i class="fa fa-cube"></i> Starter App
                <span class="muted">/ laravel 5 application</span>

            </h1>
        </a>

{{--        @include('site.includes.localization')--}}

    </div>
</div>

<nav id="header-nav" class="navbar navbar-default navbar-static-top">

    <div class="container">

        <ul class="nav navbar-nav">
            @section('nav')
                <li class="{{ ( Request::url() == URL::route('home') ? 'active' : '' ) }}">
                    <a href="{{{ URL::route('home') }}}">Home</a>
                </li>
            @show
        </ul>

        <ul class="nav navbar-nav pull-right">
            @section('nav-right')

                @if (Auth::check())

                    <li>
                        <a href="{{{ URL::to('admin') }}}">Admin Panel</a>
                    </li>

                    <li class="{{ ( Request::url() == URL::route('my-account.profile') ? ' active' : '') }}">
                        <a href="{{ URL::route('my-account.profile') }}">{{{ Auth::user()->name }}}</a>
                    </li>
                    <li>
                        <a href="{{ URL::route('auth.logout') }}">Logout</a>
                    </li>
                @else
                    <li class="{{ ( Request::url() == URL::route('auth.login') ? ' active' : '') }}">
                        <a href="{{ URL::route('auth.login') }}">Login</a>
                    </li>
                    <li class="{{ ( Request::url() == URL::route('auth.register') ? ' active' : '') }}">
                        <a href="{{ URL::route('auth.register') }}">Register</a>
                    </li>
                @endif

            @show
        </ul>
    </div>
</nav>