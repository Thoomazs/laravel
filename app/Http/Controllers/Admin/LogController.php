<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Repositories\LogRepository;
use App\Log;
use Illuminate\Http\Request;

use Illuminate\Session\Store as Session;

/**
 * Class LogController

 */
class LogController extends AdminController
{
    protected $log;

    function __construct( LogRepository $log, Session $session )
    {
        parent::__construct($session);

        $this->log = $log;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Request $request )
    {
        if ( ( $s = $request->get( 's' ) ) )
        {
            $this->log = $this->log->search( $s );
        }

        $logs = $this->log->paginate();

        return view( "admin.log.index", compact( 'logs' ) );
    }


}
