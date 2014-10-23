<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

use Illuminate\Session\Store as Session;

/**
 * @Middleware("csrf")
 * @Middleware("admin")
 * @Controller(prefix="admin")
 *
 */
class AdminController extends BaseController
{

    function  __construct( Session $session )
    {
        parent::__construct( $session );
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
