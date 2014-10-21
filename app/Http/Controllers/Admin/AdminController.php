<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\Event;

/**
 * @Middleware("csrf")
 * @Middleware("admin")
 * @Controller(prefix="admin")
 *
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
    public function getWelcome(Log $log)
    {

        $log->info(date(strtotime("now")));

        return view( "admin.welcome" );
    }


}
