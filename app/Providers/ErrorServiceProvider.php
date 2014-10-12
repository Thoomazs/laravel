<?php namespace App\Providers;

use Exception;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Exception\Handler;
use Predis\Response;

class ErrorServiceProvider extends ServiceProvider
{

    /**
     * Register any error handlers.
     *
     * @param  Handler $handler
     * @param  Log     $log
     *
     * @return void
     */
    public function boot( Handler $handler, Log $log )
    {
        // Here you may handle any errors that occur in your application, including
        // logging them or displaying custom views for specific errors. You may
        // even register several error handlers to handle different types of
        // exceptions. If nothing is returned, the default error view is
        // shown, which includes a detailed stack trace during debug.
        $handler->error( function ( Exception $e, $code ) use ( $log )
        {
            $log->error( $e );

            if ( !Config::get( 'app.debug' ) )
            {

                switch ( $code )
                {
                    case 403:
                        return response( view( 'error.403' ), 403 );

                    case 404:
                        return response( view( 'error.404' ), 404 );

                    case 500:
                        return response( view( 'error.500' ), 500 );

                    default:
                        return response( view( 'error.default', compact( 'code' ) ), $code );
                }
            }
        } );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
