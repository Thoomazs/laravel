<?php
/**
 * Created by PhpStorm.
 * User: Thomazs
 * Date: 22.10.14
 * Time: 23:45
 */

namespace App\Http\Repositories;

use Illuminate\Log\Writer as Log;
use Illuminate\Session\Store as Session;

class BaseRepository {

    protected $log;

    protected $session;

    function __construct(Log $log, Session $session)
    {
        $this->log = $log;

        $this->session = $session;
    }


}