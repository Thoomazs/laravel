<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\Event;

/**
 * @Middleware("admin")
 */
class AdminController extends BaseController
{

    protected $_perPage;

    function  __construct()
    {
        $this->_perPage = 20;
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
