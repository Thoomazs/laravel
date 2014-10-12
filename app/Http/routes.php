<?php

    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the Closure to execute when that URI is requested.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::group( [ 'prefix' => 'admin' ], function ()
    {

        Route::bind( "users", function ( $id )
        {
            return App\User::find($id);
        } );

        Route::resource( 'users', 'Admin\UsersController' );

        //        Route::resource( 'product', 'Admin\ProductsController' );

        Route::resource( 'log', 'Admin\LogController', [ 'only' => 'index' ] );

        Route::get( '/', [ 'as' => 'admin', 'uses' => 'Admin\AdminController@getWelcome' ] );
    } );


    /*
    |--------------------------------------------------------------------------
    | Auth, Reminders & My-Account Routes
    |--------------------------------------------------------------------------
    |
    */


    //    Route::controller( 'password', [ 'uses' => 'Auth\RemindersController'] );

    get( 'register', [ 'as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm' ] );

    post( 'register', 'Auth\AuthController@register' );

    get( 'login', [ 'as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm' ] );

    post( 'login', 'Auth\AuthController@login' );

    get( 'logout', [ 'as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout' ] );

    get( 'profile', [ 'as' => 'my-account.profile', 'uses' => 'Auth\MyAccountController@getProfile' ] );


    /*
    |--------------------------------------------------------------------------
    | Static site Routes
    |--------------------------------------------------------------------------
    |
    */

    get( '/', array( 'as' => 'home', 'uses' => 'HomeController@index' ) );
    post( '/', array( 'uses' => 'HomeController@postIndex' ) );