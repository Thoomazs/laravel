<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

/**
 * @Middleware("csrf")
 * @Middleware("admin")
 * @Controller(prefix="admin")
 *
 */
class AdminController extends BaseController
{

    function  __construct( )
    {
        parent::__construct( );
    }

    /**
     *
     * @Get("admin", as="admin")
     *
     * @return Container
     */
    public function getWelcome()
    {

        return view( "admin.welcome" );
    }


}
