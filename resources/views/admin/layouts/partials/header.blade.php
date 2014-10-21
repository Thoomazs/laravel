<div class="container">

    <a class="navbar-brand" href="{{{ route('admin') }}}">
         ADMIN
    </a>


    <ul class="nav navbar-nav">
        @section('nav')

        <li class="dropdown {{ ( Request::url() == route('admin.users.index') ? 'active' : '' ) }}">
            <a href="{{ route('admin.users.index') }}" class="dropdown-toggle">
              Users
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href=""> ... </a>
                </li>
            </ul>
        </li>
        <li class="{{ ( Request::url() == route('admin.log.index') ? 'active' : '' ) }}">
            <a href="{{ route('admin.log.index') }}">Log</a>
        </li>
        @show
    </ul>

    <ul class="nav navbar-nav pull-right">
        <li>
            <a href="{{ route('auth.logout') }}">Logout</a>
        </li>
    </ul>
</div>
