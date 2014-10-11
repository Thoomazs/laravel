<!DOCTYPE html>

<html lang="cs">
    <head>
        @include('site.layouts.partials.head')
    </head>
    <body>

        <header id="header">
            @include('site.layouts.partials.header')
        </header>

        <div id="content">
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer id="footer" class="row">
            @include('site.layouts.partials.footer')
        </footer>

    </body>
</html>