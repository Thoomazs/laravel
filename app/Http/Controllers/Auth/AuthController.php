<?php namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\Authenticator;
use App\User;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController {

	/**
	 * The authenticator implementation.
	 *
	 * @var Authenticator
	 */
	protected $auth;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  Authenticator  $auth
	 * @return void
	 */
	public function __construct(Authenticator $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Show the application registration form.
	 *
	 * @return Response
	 */
	public function showRegistrationForm()
	{
        return view('site.auth.register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  RegisterRequest  $request
	 * @return Response
	 */
	public function register(RegisterRequest $request, User $user)
	{
        // Registration form is valid, create user...
        $new_user = $user->create($request->all());

        $this->auth->login($new_user);

        return redirect('/');
	}

	/**
	 * Show the application login form.
	 *
	 * @return Response
	 */
	public function showLoginForm()
	{
        return view('site.auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  LoginRequest  $request
	 * @return Response
	 */
	public function login(LoginRequest $request)
	{

		if ($this->auth->attempt($request->only('email', 'password')))
		{
			return redirect('/');
		}

		return redirect()->back()->withErrors([
			'email' => 'The credentials you entered did not match our records. Try again?'
		]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return Response
	 */
	public function logout()
	{
		$this->auth->logout();

		return redirect('/');
	}

}