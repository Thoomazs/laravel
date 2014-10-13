<?php namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\Guard;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

use App\User;
/**
 * @Middleware("csrf")
 * @Middleware("guest", except={"logout"})
 */
class AuthController {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Show the application registration form.
	 *
	 * @Get("auth/register")
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
	 * @Post("auth/register")
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
	 * @Get("auth/login")
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
	 * @Post("auth/login")
	 *
	 * @param  LoginRequest  $request
	 * @return Response
	 */
	public function login(LoginRequest $request)
	{
		if ($this->auth->attempt($request->only('email', 'password')))
		{
			return redirect()->route('home');
		}

		return redirect()->route('auth.login')->withErrors([
			'email' => 'These credentials do not match our records.',
		]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @Get("auth/logout")
	 *
	 * @return Response
	 */
	public function logout()
	{
		$this->auth->logout();

		return redirect('/');
	}

}
