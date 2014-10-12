<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

/**
 * @Middleware("csrf")
 * @Middleware("admin", except={"logout"})
 */
class AdminController extends BaseController
{


    function  __construct()
    {

    }

    /**
     * @return Container
     */
    public function getWelcome()
    {
        return view( "admin.welcome" );
    }


}
