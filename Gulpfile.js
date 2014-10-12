var elixir = require( './vendor/laravel/elixir/Elixir' );

/*
 |----------------------------------------------------------------
 | Have a Drink!
 |----------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic
 | Gulp tasks for your Laravel application. Elixir supports
 | several common CSS, JavaScript and even testing tools!
 |
 */

elixir( function( mix ) {
    mix.less( "style.less" )
        .styles( ["css/bootstrap.min.css", "css/font-awesome.min.css", "css/style.css"] )
        .version( "css/all.min.css" )
} );
