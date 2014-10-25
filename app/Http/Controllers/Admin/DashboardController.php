<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

/**
 * @Resource("admin", only={"index"}, names={"index": "admin"})
 * @Middleware("admin")
 *
 */
class DashboardController extends BaseController
{

    function  __construct( )
    {
        parent::__construct( );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

        return view( "admin.welcome" );
    }


}
