<div class="container">

    <a class="navbar-brand" href="{{{ URL::route('admin') }}}">
         {{{ Lang::get('admin/nav.admin') }}}
    </a>


    <ul class="nav navbar-nav">
        @section('nav')

        <li class="dropdown {{ ( Request::url() == URL::route('admin.users.index') ? 'active' : '' ) }}">
            <a href="{{ URL::route('admin.users.index') }}" class="dropdown-toggle">
                {{{ Lang::get('admin/nav.users') }}}
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href=""> ... </a>
                </li>
            </ul>
        </li>
        <li class="{{ ( Request::url() == URL::route('admin.log.index') ? 'active' : '' ) }}">
            <a href="{{ URL::route('admin.log.index') }}">{{{ Lang::get('admin/nav.log') }}}</a>
        </li>
        @show
    </ul>

    <ul class="nav navbar-nav pull-right">
        <li>
            <a href="{{ URL::route('auth.logout') }}"> {{{ Lang::get('user/user.logout') }}} </a>
        </li>
    </ul>
</div>
