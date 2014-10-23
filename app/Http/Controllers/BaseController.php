<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Session\Store as Session;

class BaseController extends Controller
{

    protected $session;

    function  __construct(Session $session)
    {
        $this->session = $session;
    }


    protected function flash($msg, $class = 'msg-success') {
        $this->session->flash( $class, $msg );
    }
}