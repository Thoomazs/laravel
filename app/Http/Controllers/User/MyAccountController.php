<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;

/**
 * @Middleware("auth")
 */
class MyAccountController extends BaseController {

    /**
     * Show the application registration form.
     *
     * @Get("profile", as="my-account.profile")
     *
     * @return Response
     */
    public function getProfile()
    {
        return view('site.user.profile');
    }

}
