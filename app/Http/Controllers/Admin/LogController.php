<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Log;
/**
 * Class LogController
 *
 * @package App\Http\Controllers\Admin
 * @Resource("admin/log", only="index")
 */
class LogController extends AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Log $log )
    {
        $logs = $log->orderBy("id", "DESC")->get();

        return view( "admin.log.index", compact( 'logs' ) );
    }


}
