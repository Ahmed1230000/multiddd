<?php

namespace App\Domain\User\Http\Controllers\Auth;

use App\Domain\User\Http\Requests\Loginuser\LoginuserStoreFormRequest;
use App\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * View Path.
     *
     * @var string
     */
    protected $viewPath = 'user';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'users';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'users';

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    public function __construct()
    {
        // $this->middleware('auth:user-api')->except('logout');
    }
    // public function showLoginForm()
    // {
    //     return view("{$this->domainAlias}::{$this->viewPath}.auth.login", [
    //         'title' => __('main.login')
    //     ]);
    // }
    public function create(LoginuserStoreFormRequest $request)
    {
        $user = request(['email', 'password']);
        if (!Auth::guard('user')->attempt($user)) {
            return response()->json(['message' => "Stope!! Register And Tray Again !!"],404);
        }
        $userCatch = Auth::guard('user')->user();
        $userToken = $userCatch;
        $userToken['token'] = $userCatch->createToken('user')->accessToken;
        return response()->json(
            [
                'Data' =>
                [
                    'User' => Auth::guard('user')->user(),
                    'accessToken' => $userToken->accessToken,
                    'Token_type' => 'Bearer',
                ]
            ]
        );
    }
    // protected function authenticated()
    // {
    //     if (auth()->check()) {
    //         return redirect()->intended(route('dashboard'));
    //     }

    //     return redirect()->intended($this->redirectPath());
    // }
}
