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

    Route::group( [ 'prefix' => 'admin', 'before' => 'auth' ], function () {

        Route::resource( 'users', 'Admin\UsersController' );

        Route::resource( 'product', 'Admin\ProductsController' );

        Route::resource( 'log', 'Admin\LogController' );

        Route::get( '/', [ 'as'   => 'admin', 'uses' => 'Admin\AdminController@getWelcome' ] );
    } );


    /*
    |--------------------------------------------------------------------------
    | Auth, Reminders & My-Account Routes
    |--------------------------------------------------------------------------
    |
    */



//    Route::controller( 'password', 'Auth\RemindersController' );

    Route::get( 'register', [ 'as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister' ] );

    Route::post( 'register', [ 'uses' => 'Auth\AuthController@postRegister' ] );

    Route::get( 'login', [ 'as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin' ] );

    Route::post( 'login', [ 'uses' => 'Auth\AuthController@postLogin' ] );

    Route::get( 'logout', array( 'as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout' ) );

    Route::get( 'profile', array( 'as' => 'my-account.profile', 'uses' => 'Auth\MyAccountController@getProfile' ) );


    /*
    |--------------------------------------------------------------------------
    | Static site Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get( '/', array( 'as' => 'home', 'uses' => 'HomeController@index' ) );