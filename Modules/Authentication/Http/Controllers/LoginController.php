<?php

namespace Modules\Authentication\Http\Controllers;

use Modules\Utils\Enums\StatusEnum;
use Modules\Utils\ApiReturn\ApiReturn;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    protected $token = null;

    use AuthenticatesUsers {
        logout as logoutUser;
        sendLoginResponse as sendLoginResponseOriginal;
        sendFailedLoginResponse as sendFailedLoginResponseOriginal;
        attemptLogin as attemptLoginOriginal;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {   
        $this->token = Auth::attempt($this->credentials($request));

        if (!$this->token)
            return ApiReturn::ErrorMessage("Credenciais Inválidas", 401);

        $this->token = $this->guard()->user()->createToken('Laravel Password Grant Client')->accessToken;
        return $this->token;
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user()))
            return $response;

        if (!$this->token)
            return ApiReturn::ErrorMessage("Credenciais Inválidas", 401);

        return ApiReturn::KeyMessage('Bearer', 200, $this->token, 'token');
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return ApiReturn::ErrorMessage('Você não possui permissão suficiente para autenticar.', 401);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $fieldType = filter_var($request->{$this->username()}, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        return [
            $fieldType => $request->{$this->username()},
            'password' => $request->password,
            'status' => StatusEnum::ACTIVE
        ];
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        return ApiReturn::SuccessMessage('Usuario deslogado com sucesso');
    }

    public function unauthorized(Request $request)
    {
        return ApiReturn::ErrorMessage("Credenciais Inválidas", 401);
    }
}
