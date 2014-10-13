<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;

class MyAccountController extends BaseController {

    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function getProfile()
    {
        return view('site.auth.profile')->withErrors("asdasd");
    }

}
